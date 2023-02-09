<?php include_once "../config/database.php" ?>

<?php

function id_usuario(string $user_name){
    $conexion = new DBOPERATION('../database/math.db');
    $user_id = $conexion->retornar_resultado_de_busqueda("SELECT user_id FROM users WHERE user_name=:user_name",
                                                        [$user_name]);
    return $user_id[0][0];
}

function puntaje_usuario($user_id){
    $conexion = new DBOPERATION('../database/math.db');
    $puntaje = $conexion->retornar_resultado_de_busqueda("SELECT puntuacion FROM puntaje WHERE user_id=:user_id",
                                                        [$user_id]);
    return $puntaje[0][0];
}

?>