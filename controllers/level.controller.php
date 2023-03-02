<?php

function get_levels($id_numb){
    include_once "../config/levels.php";

    switch($id_numb){
        case 0:
            return $level_1;
        case 1:
            return $level_2;
        case 2:
            return $level_3;
        case 3:
            return $level_4;
        case 4:
            return $level_5;
        case 5:
            return $level_6;
        case 6:
            return $level_7;
        case 7:
            return $level_8;
        case 8:
            return $level_9;
        case 9:
            return $level_10;
        case 10:
            return $level_11;
        case 11:
            return $level_12;
        case 12:
            return $level_13;
        case 13:
            return $level_14;
        case 14:
            return $level_15;
        case 15:
            return $level_16;
        case 16:
            return $level_17;
        case 17:
            return $level_18;
        case 18:
            return $level_19;
        case 19:
            return $level_20;
        default:
            return $level_1;
    }
}

function desbloquear_siguiente_nivel($id_numb, $db){
    include_once "../config/database.php";
    include_once "../utils/user.getter.php";

    $user_name = $_SESSION['user'];
    $user_id = id_usuario($user_name);
    $conexion = new DBOPERATION($db);

    switch($id_numb){
        case 0:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 1]);
            break;
        case 1:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 2]);
            break;
        case 2:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 3]);
            break;
        case 3:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 4]);
            break;
        case 4:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 5]);
            break;
        case 5:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 6]);
            break;
        case 6:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 7]);
            break;
        case 7:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 8]);
            break;
        case 8:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 9]);
            break;
        case 9:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 10]);
            break;
        case 10:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 11]);
            break;
        case 11:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 12]);
            break;
        case 12:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 13]);
            break;
        case 13:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 14]);
            break;
        case 14:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 15]);
            break;
        case 15:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 16]);
            break;
        case 16:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 17]);
            break;
        case 17:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 18]);
            break;
        case 18:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 19]);
            break;
        case 19:
            $conexion->exec_query("UPDATE niveles SET level_status=:level_status
                                  WHERE user_id=:user_id AND level_id=:level_id",
                                    [1, $user_id, 20]);
            break;
        default:
            break;
    }

}

?>