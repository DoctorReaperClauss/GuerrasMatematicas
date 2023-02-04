<?php include_once "./config/database.php"; ?>
<?php include_once "./config/levels.php"; ?>
<?php include_once "./controllers/register.controller.php"; ?>
<?php include_once "./controllers/login.controller.php"; ?>

<?php
session_start();
$conexion = new DBOPERATION('database/math.db');
$error = '';

function create_user_data(string $user_name, $conexion){
    $_SESSION['user'] == $user_name;
    $conexion->insert_data($user_name);
    // header('location:./views/main.php');
}

if ($_POST) {
    if ($_POST['action'] === 'Logearse') {
        $login = login('database/math.db', $_POST['user_name'], $_POST['user_pass']);

        if ($login != "loggin con exito") {
            $error = $login;
        } else {
            create_user_data($_POST['user_name'], $conexion);
        }

    } elseif ($_POST['action'] === 'Registrarse') {
        $registro = registrarUsuario('database/math.db', $_POST['user_name'], $_POST['user_pass']);

        if ($registro == "el usuario existe") {
            $error = "el usuario ya existe";
        } else {
            create_user_data($_POST['user_name'], $conexion);
        }
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