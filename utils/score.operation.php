<?php include_once "../utils/user.getter.php" ?>
<?php include_once "../config/database.php" ?>

<?php
function sumar_puntuacion($db){
    $user_name = $_SESSION['user'];
    $user_id = id_usuario($user_name);
    $user_score = puntaje_usuario($user_id);
    $conexion = new DBOPERATION($db);

    //sumarle puntuacion
    $conexion->exec_query("UPDATE puntaje SET puntuacion=:puntaje WHERE user_id=:user_id", [$user_score+5, $user_id]);
}


?>