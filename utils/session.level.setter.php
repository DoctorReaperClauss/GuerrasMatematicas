<?php
function set_session_level($level_reference){
    switch($level_reference){
        case "NIVEL 1":
            $_SESSION['level_id'] = 0;
            break;
        case "NIVEL 2":
            $_SESSION['level_id'] = 1;
            break;
        case "NIVEL 3":
            $_SESSION['level_id'] = 2;
            break;
        case "NIVEL 4":
            $_SESSION['level_id'] = 3;
            break;
        case "NIVEL 5":
            $_SESSION['level_id'] = 4;
            break;
        case "NIVEL 6":
            $_SESSION['level_id'] = 5;
            break;
        case "NIVEL 7":
            $_SESSION['level_id'] = 6;
            break;
        case "NIVEL 8":
            $_SESSION['level_id'] = 7;
            break;
        case "NIVEL 9":
            $_SESSION['level_id'] = 8;
            break;
        case "NIVEL 10":
            $_SESSION['level_id'] = 9;
            break;
        case "NIVEL 11":
            $_SESSION['level_id'] = 10;
            break;
        case "NIVEL 12":
            $_SESSION['level_id'] = 11;
            break;
        case "NIVEL 13":
            $_SESSION['level_id'] = 12;
            break;
        case "NIVEL 14":
            $_SESSION['level_id'] = 13;
            break;
        case "NIVEL 15":
            $_SESSION['level_id'] = 14;
            break;
        case "NIVEL 16":
            $_SESSION['level_id'] = 15;
            break;
        case "NIVEL 17":
            $_SESSION['level_id'] = 16;
            break;
        case "NIVEL 18":
            $_SESSION['level_id'] = 17;
            break;
        case "NIVEL 19":
            $_SESSION['level_id'] = 18;
            break;
        case "NIVEL 20":
            $_SESSION['level_id'] = 19;
            break;
        default:
            echo "adios";
    }
}


?>