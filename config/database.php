<?php

class DBCONNECTION
{
    protected $conexion;

    public function __construct(string $db_path)
    {
        try {
            $this->conexion = new PDO("sqlite:$db_path");
            $this->create_tables();
            $this->insert_data();
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

    public function insert_data()
    {
        //llenar la tabla de niveles con los datos de los 20 niveles existentes
        $data_already_in_table = $this->conexion->exec("SELECT * FROM niveles");

        //si ya hay datos en al tabla, no hagas nada
        if ($data_already_in_table != []) {
            return false;
        }

        //si no hay, llena esa vaina
        for ($i = 0; $i <= 20; $i++) {
            $this->conexion->exec("INSERT INTO niveles VALUES($i, 0)");
        }

    }

}

class DBOPERATION extends DBCONNECTION
{
    public function exec_query(string $query, array $params)
    {
        //?para evitar ataques de sql injection
        //preparar la query
        $prepared_statement = $this->conexion->prepare($query);

        //ejecutar la query
        $prepared_statement->execute($params);
    }

    public function return_search_result(string $query, array $params)
    {
        $prepared_statement = $this->conexion->prepare($query);
        $prepared_statement->execute($params);

        return $prepared_statement->fetchAll();
    }
}