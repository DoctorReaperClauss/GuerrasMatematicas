<?php include_once "../utils/session.validator.php" ?>
<?php include_once "../utils/user.getter.php" ?>
<?php include_once "../utils/session.level.setter.php" ?>

<?php
$user_name = $_SESSION['user'];
$user_id = id_usuario($user_name);
$user_score = puntaje_usuario($user_id);
$user_levels = progreso_niveles_usuario($user_id);

function asignar_clase($level_number){
    global $user_levels;
    $level_info = $user_levels[$level_number];

    if($level_info['level_status'] == 1 || $level_info['level_status'] == 2){ //nivel desbloqueado
        return "desbloqueado";
    }

    return "bloqueado";
}

if($_GET){
    set_session_level($_GET['level']);
    header('location:level.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/imgs/perfil.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../public/styles/main.css">
    <title>Guerras Matematicas</title>
</head>

<body>
    <div class="container">
        <aside class="user-info">
            <h2>Usuario</h2>
            <p> <?php echo $user_name; ?> </p>
            <h3>Puntaje</h3>
            <p class="puntaje"> <?php echo $user_score?> </p>
        </aside>
        <div class="main-menu">
            <div class="form-container">
                <h1>Guerras Matemáticas</h1>
                <form action="main.php", method="get">
                    <div class="form-row">
                        <input name="level" type="submit" class="<?php echo asignar_clase(0) ?>" value="NIVEL 1">
                        <input name="level" type="submit" class="<?php echo asignar_clase(1) ?>" value="NIVEL 2">
                        <input name="level" type="submit" class="<?php echo asignar_clase(2) ?>" value="NIVEL 3">
                        <input name="level" type="submit" class="<?php echo asignar_clase(3) ?>" value="NIVEL 4">
                    </div>
                    <div class="form-row">
                        <input name="level" type="submit" class="<?php echo asignar_clase(4) ?>" value="NIVEL 5">
                        <input name="level" type="submit" class="<?php echo asignar_clase(5) ?>" value="NIVEL 6">
                        <input name="level" type="submit" class="<?php echo asignar_clase(6) ?>" value="NIVEL 7">
                        <input name="level" type="submit" class="<?php echo asignar_clase(7) ?>" value="NIVEL 8">
                    </div>
                    <div class="form-row">
                        <input name="level" type="submit" class="<?php echo asignar_clase(8) ?>" value="NIVEL 9">
                        <input name="level" type="submit" class="<?php echo asignar_clase(9) ?>" value="NIVEL 10">
                        <input name="level" type="submit" class="<?php echo asignar_clase(10) ?>" value="NIVEL 11">
                        <input name="level" type="submit" class="<?php echo asignar_clase(11) ?>" value="NIVEL 12">
                    </div>
                    <div class="form-row">
                        <input name="level" type="submit" class="<?php echo asignar_clase(12) ?>" value="NIVEL 13">
                        <input name="level" type="submit" class="<?php echo asignar_clase(13) ?>" value="NIVEL 14">
                        <input name="level" type="submit" class="<?php echo asignar_clase(14) ?>" value="NIVEL 15">
                        <input name="level" type="submit" class="<?php echo asignar_clase(15) ?>" value="NIVEL 16">
                    </div>
                    <div class="form-row">
                        <input name="level" type="submit" class="<?php echo asignar_clase(16) ?>" value="NIVEL 17">
                        <input name="level" type="submit" class="<?php echo asignar_clase(17) ?>" value="NIVEL 18">
                        <input name="level" type="submit" class="<?php echo asignar_clase(18) ?>" value="NIVEL 19">
                        <input name="level" type="submit" class="<?php echo asignar_clase(19) ?>" value="NIVEL 20">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>