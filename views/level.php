<?php include_once "../utils/level.validator.php" ?>
<?php include_once "../controllers/level.controller.php" ?>

<?php
$level = get_levels($_SESSION['level_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/level.css">
    <title>Document</title>
</head>
<body>
    <form class="float-form" action="level.php", method="post">
        <input class="btn-pista" type="submit" value="Canjear Pista" name="pista">
    </form>
    <form class="main-form" action="level.php", method="post">
        <div class="card-ejercicio">
            <h2>Ejercicio 1</h2>
            <p><?php echo $level['EJERCICIO_1']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-1" placeholder="Coloque El Resultado">
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 2</h2>
            <p><?php echo $level['EJERCICIO_2']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-2" placeholder="Coloque El Resultado">
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 3</h2>
            <p><?php echo $level['EJERCICIO_3']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-3" placeholder="Coloque El Resultado">
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 4</h2>
            <p><?php echo $level['EJERCICIO_4']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-4" placeholder="Coloque El Resultado">
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 5</h2>
            <p><?php echo $level['EJERCICIO_5']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-5" placeholder="Coloque El Resultado">
        </div>
        <input class="btn-result" type="submit" name="submit-resultado" value="Validar Resultados">
    </form>

</body>
</html>