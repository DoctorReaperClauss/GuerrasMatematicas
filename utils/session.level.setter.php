<?php
function set_session_level($level_reference){
    switch($level_reference){
        case "NIVEL 1":
            return 0;
        case "NIVEL 2":
            return 1;
        case "NIVEL 3":
            return 2;
        case "NIVEL 4":
            return 3;
        case "NIVEL 5":
            return 4;
        case "NIVEL 6":
            return 5;
        case "NIVEL 7":
            return 6;
        case "NIVEL 8":
            return 7;
        case "NIVEL 9":
            return 8;
        case "NIVEL 10":
            return 9;
        case "NIVEL 11":
            return 10;
        case "NIVEL 12":
            return 11;
        case "NIVEL 13":
            return 12;
        case "NIVEL 14":
            return 13;
        case "NIVEL 15":
            return 14;
        case "NIVEL 16":
            return 15;
        case "NIVEL 17":
            return 16;
        case "NIVEL 18":
            return 17;
        case "NIVEL 19":
            return 18;
        case "NIVEL 20":
            return 19;
        default:
            echo "adios";
    }
}


?>