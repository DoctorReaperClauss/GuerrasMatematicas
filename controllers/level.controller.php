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



?>