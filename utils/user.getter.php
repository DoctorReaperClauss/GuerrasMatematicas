<?php include_once "../config/database.php" ?>

<?php
$conexion = new DBOPERATION('../database/math.db');

function id_usuario(string $user_name){
    global $conexion;
    $user_id = $conexion->retornar_resultado_de_busqueda("SELECT user_id FROM users WHERE user_name=:user_name",
                                                        [$user_name]);
    return $user_id[0][0];
}

function puntaje_usuario($user_id){
    global $conexion;
    $puntaje = $conexion->retornar_resultado_de_busqueda("SELECT puntuacion FROM puntaje WHERE user_id=:user_id",
                                                        [$user_id]);
    return $puntaje[0][0];
}

function progreso_niveles_usuario($user_id){
    global $conexion;
    $niveles = $conexion->retornar_resultado_de_busqueda("SELECT level_id, level_status FROM niveles WHERE user_id=:user_id",
                                                        [$user_id]);
    return $niveles;
}

?>