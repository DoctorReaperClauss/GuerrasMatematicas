<?php

class DBCONNECTION
{
    protected $conexion;

    public function __construct(string $db_path)
    {
        try {
            $this->conexion = new PDO("sqlite:$db_path");
            $this->create_tables();
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function create_tables()
    {
        $tables = array(
            "CREATE TABLE IF NOT EXISTS users (
                user_id INTEGER PRIMARY KEY,
                user_name TEXT NOT NULL,
                user_pass TEXT NOT NULL
            )",
            "CREATE TABLE IF NOT EXISTS puntaje (
                user_id INTEGER,
                puntuacion INTEGER
            )",
            "CREATE TABLE IF NOT EXISTS niveles (
                user_id INTEGER,
                level_id INTEGER,
                level_status INTEGER
            )",
        );
        foreach ($tables as $create_table) {
            $this->conexion->exec($create_table);
        }
    }

}

class DBOPERATION extends DBCONNECTION
{
    public function exec_query(string $query, array $params)
    {
        $prepared_statement = $this->conexion->prepare($query);

        $prepared_statement->execute($params);
    }

    public function return_search_result(string $query, array $params)
    {
        $prepared_statement = $this->conexion->prepare($query);
        $prepared_statement->execute($params);

        return $prepared_statement->fetchAll();
    }

    public function insert_data(string $user_name)
    {
        //obtener el id de ese usuario para llenarle sus respectivos datos de cada nivel
        $user_id = $this->return_search_result("SELECT user_id FROM users WHERE user_name=:user_name", [$user_name])[0][0];

        //llenar la tabla de niveles con los datos de los 20 niveles existentes
        $data_already_in_table = $this->return_search_result("SELECT * FROM niveles WHERE user_id=:user_id", [$user_id]);

        //si ya hay datos en al tabla, no hagas nada (significa que ese usuario ya tiene progreso)
        if ($data_already_in_table != []) {
            return false;
        }

        //si no hay, llena esa vaina
        for ($i = 0; $i <= 20; $i++) {
            //activar el nivel 1
            if ($i == 0) {
                $this->conexion->exec("INSERT INTO niveles VALUES($user_id, $i, 1)");
                continue;
            }

            //desactivar el resto
            $this->conexion->exec("INSERT INTO niveles VALUES($user_id, $i, 0)");
        }

    }
}