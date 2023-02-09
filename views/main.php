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
            <p> <?php echo $user_score ?> </p>
        </aside>
        <div class="main-menu">
            <h1>Guerras Matematicas</h1>
            <table>
                <tr>
                    <td class="nivel <?php echo asignar_clase(0) ?>">NIVEL 1</td>
                    <td class="nivel <?php echo asignar_clase(1) ?>">NIVEL 2</td>
                    <td class="nivel <?php echo asignar_clase(2) ?>">NIVEL 3</td>
                    <td class="nivel <?php echo asignar_clase(3) ?>">NIVEL 4</td>
                    <td class="nivel <?php echo asignar_clase(4) ?>">NIVEL 5</td>
                </tr>
                <tr>
                    <td class="nivel <?php echo asignar_clase(5) ?>">NIVEL 6</td>
                    <td class="nivel <?php echo asignar_clase(6) ?>">NIVEL 7</td>
                    <td class="nivel <?php echo asignar_clase(7) ?>">NIVEL 8</td>
                    <td class="nivel <?php echo asignar_clase(8) ?>">NIVEL 9</td>
                    <td class="nivel <?php echo asignar_clase(9) ?>">NIVEL 10</td>
                </tr>
                <tr>
                    <td class="nivel <?php echo asignar_clase(10) ?>">NIVEL 11</td>
                    <td class="nivel <?php echo asignar_clase(11) ?>">NIVEL 12</td>
                    <td class="nivel <?php echo asignar_clase(12) ?>">NIVEL 13</td>
                    <td class="nivel <?php echo asignar_clase(13) ?>">NIVEL 14</td>
                    <td class="nivel <?php echo asignar_clase(14) ?>">NIVEL 15</td>
                </tr>
                <tr>
                    <td class="nivel <?php echo asignar_clase(15) ?>">NIVEL 16</td>
                    <td class="nivel <?php echo asignar_clase(16) ?>">NIVEL 17</td>
                    <td class="nivel <?php echo asignar_clase(17) ?>">NIVEL 18</td>
                    <td class="nivel <?php echo asignar_clase(18) ?>">NIVEL 19</td>
                    <td class="nivel <?php echo asignar_clase(19) ?>">NIVEL 20</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>