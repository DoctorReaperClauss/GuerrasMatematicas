<?php include_once "./config/database.php"; ?>
<?php include_once "./config/levels.php"; ?>
<?php include_once "./controllers/register.controller.php"; ?>
<?php include_once "./controllers/login.controller.php"; ?>

<?php
session_start();
$conexion = new DBOPERATION('database/math.db');
$error = '';

//funciones del usuario
function crear_data_del_usuario(string $user_name, $conexion)
{
    $_SESSION['user'] = $user_name;
    $conexion->insert_data($user_name);
    header('location:./views/main.php');
}

function logear_al_usuario(string $user_name, $conexion)
{
    $estado_login = loggear_usuario('database/math.db', $_POST['user_name'], $_POST['user_pass']);

    if ($estado_login != "loggin con exito") {
        global $error;
        $error = $estado_login;
        return false;
    }
    crear_data_del_usuario($user_name, $conexion);
}

function registrar_al_usuario(string $user_name, $conexion)
{
    $estado_registro = registrar_usuario('database/math.db', $_POST['user_name'], $_POST['user_pass']);

    if ($estado_registro == "el usuario existe") {
        global $error;
        $error = $estado_registro;
        return false;
    }
    crear_data_del_usuario($user_name, $conexion);
}

//funciones de validacion
function existen_datos_vacios(): bool
{
    if (empty(trim($_POST['user_name'])) or empty(trim($_POST['user_pass']))) {
        return true;
    }
    return false;
}
function POST_valido()
{
    if (existen_datos_vacios()) {
        global $error;
        $error = 'Faltan datos, por favor introduzcalos todos';
        return false;
    }
    return true;
}

function POST_control(string $user_name, $conexion)
{
    if ($_POST['action'] == 'Logearse') {
        logear_al_usuario($user_name, $conexion);
    } else {
        registrar_al_usuario($user_name, $conexion);
    }

}

//main
if ($_POST) {
    if (POST_valido()) {
        POST_control($_POST['user_name'], $conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guerras Matematicas</title>
</head>

<body>

    <div class="container">
        <h1>Guerras Matematicas</h1>
        <p>
            <?php echo $error ?>
        </p>
        <form action="./index.php" method="post">
            <input type="text" name="user_name" id="user_name" placeholder="Introduzca su usuario">
            <input type="password" name="user_pass" id="user_pass" placeholder="Introduzca su contraseña">

            <div class="buttons">
                <input type="submit" value="Logearse" name="action">
                <input type="submit" value="Registrarse" name="action">
            </div>
        </form>
    </div>

</body>

</html>