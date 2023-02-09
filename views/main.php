<?php include_once "../utils/session.validator.php" ?>
<?php include_once "../utils/user.getter.php" ?>
<?php include_once "../config/database.php" ?>

<?php
$user_name = $_SESSION['user'];
$conexion = new DBOPERATION('../database/math.db');
$user_id = id_usuario($user_name);
$user_score = puntaje_usuario($user_id);

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
            <h2><?php echo $user_name; ?></h2>
        </aside>
    </div>
</body>

</html>