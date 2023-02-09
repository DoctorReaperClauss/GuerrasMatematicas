<?php include_once "../utils/session.validator.php" ?>
<?php include_once "../utils/user.getter.php" ?>

<?php
$user_name = $_SESSION['user'];
$user_id = id_usuario($user_name);
$user_score = puntaje_usuario($user_id);
$user_levels = progreso_niveles_usuario($user_id);

function asignar_clase($level_number){
    global $user_levels;
    $level_info = $user_levels[$level_number];

    if($level_info['level_status'] == 1){ //nivel desbloqueado
        return "desbloqueado";
    }

    return "bloqueado";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Guerras Matematicas</title>
</head>

<body>
    <div class="container">
        <aside class="user-info">
            <h2>Usuario</h2>
            <p> <?php echo $user_name; ?> </p>
            <h3>Puntaje</h3>
            <p class="puntaje"> <?php echo $user_score ?> </p>
        </aside>
        <div class="main-menu">
            <div class="form-container">
                <h1>Guerras Matematicas</h1>
                <table>
                    <tr>
                        <td class="nivel <?php echo asignar_clase(0) ?>"><button>NIVEL 1</button></td>
                        <td class="nivel <?php echo asignar_clase(1) ?>"><button>NIVEL 2</button></td>
                        <td class="nivel <?php echo asignar_clase(2) ?>"><button>NIVEL 3</button></td>
                        <td class="nivel <?php echo asignar_clase(3) ?>"><button>NIVEL 4</button></td>
                    </tr>
                    <tr>
                        <td class="nivel <?php echo asignar_clase(4) ?>"><button>NIVEL 5</button></td>
                        <td class="nivel <?php echo asignar_clase(5) ?>"><button>NIVEL 6</button></td>
                        <td class="nivel <?php echo asignar_clase(6) ?>"><button>NIVEL 7</button></td>
                        <td class="nivel <?php echo asignar_clase(7) ?>"><button>NIVEL 8</button></td>
                    </tr>
                    <tr>
                        <td class="nivel <?php echo asignar_clase(8) ?>"><button>NIVEL 9</button></td>
                        <td class="nivel <?php echo asignar_clase(9) ?>"><button>NIVEL 10</button></td>
                        <td class="nivel <?php echo asignar_clase(10) ?>"><button>NIVEL 11</button></td>
                        <td class="nivel <?php echo asignar_clase(11) ?>"><button>NIVEL 12</button></td>
                    </tr>
                    <tr>
                        <td class="nivel <?php echo asignar_clase(12) ?>"><button>NIVEL 13</button></td>
                        <td class="nivel <?php echo asignar_clase(13) ?>"><button>NIVEL 14</button></td>
                        <td class="nivel <?php echo asignar_clase(14) ?>"><button>NIVEL 15</button></td>
                        <td class="nivel <?php echo asignar_clase(15) ?>"><button>NIVEL 16</button></td>
                    </tr>
                    <tr>
                        <td class="nivel <?php echo asignar_clase(16) ?>"><button>NIVEL 17</button></td>
                        <td class="nivel <?php echo asignar_clase(17) ?>"><button>NIVEL 18</button></td>
                        <td class="nivel <?php echo asignar_clase(18) ?>"><button>NIVEL 19</button></td>
                        <td class="nivel <?php echo asignar_clase(19) ?>"><button>NIVEL 20</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>