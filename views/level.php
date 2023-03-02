<?php include_once "../utils/level.validator.php" ?>
<?php include_once "../controllers/level.controller.php" ?>

<?php
$level = get_levels($_SESSION['level_id']);
$error = array();

function inputs_vacios($array){
    foreach ($array as $key => $value) {
        if(empty(trim($value))){
            return true;
        }
    }
    return false;
}

function inputs_no_numericos($array){
    foreach ($array as $key => $value){
        if($key == "form-control"){
            continue;
        }

        if(!is_numeric($value)){
            return true;
        }
    }
}

if($_POST){
    if($_POST['form-control'] == 'Validar Resultados'){
        if(inputs_vacios($_POST)){
            array_push($error, "Hay ejercicios sin resolver, por favor resuelvalos todos antes");
        }
        if(inputs_no_numericos($_POST)){
            array_push($error, "Todos los datos deben ser numeros, por favor compruebe sus respuestas");
        }

        if(sizeof($error) == 0){
            //codigo para validar los resultados
            print_r("hola");
        }
    }else{

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="float-form" action="level.php", method="post">
        <input class="btn-pista" type="submit" value="Canjear Pista" name="form-control">
    </form>

    <aside class="error-log">
        <!-- En caso de que haya(n) error(es), se mostrara(n) aqui -->
        <?php if(sizeof($error) != 0){ ?>
            <?php foreach ($error as $key => $value) { ?>
                <!-- va a generar una etiqueta p por cada error que haya -->
                <p> <?php echo $value; ?> </p>
            <?php } ?>
        <?php } ?>
    </aside>

    <form class="main-form" action="level.php", method="post">
        <div class="card-ejercicio">
            <h2>Ejercicio 1</h2>
            <p><?php echo $level['EJERCICIO_1']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-1" placeholder="Coloque El Resultado" value="<?php if($_POST){echo $_POST['resultado-1'];} ?>" required>
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 2</h2>
            <p><?php echo $level['EJERCICIO_2']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-2" placeholder="Coloque El Resultado" value="<?php if($_POST){echo $_POST['resultado-2'];} ?>" required>
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 3</h2>
            <p><?php echo $level['EJERCICIO_3']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-3" placeholder="Coloque El Resultado" value="<?php if($_POST){echo $_POST['resultado-3'];} ?>" required>
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 4</h2>
            <p><?php echo $level['EJERCICIO_4']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-4" placeholder="Coloque El Resultado" value="<?php if($_POST){echo $_POST['resultado-4'];} ?>" required>
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 5</h2>
            <p><?php echo $level['EJERCICIO_5']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-5" placeholder="Coloque El Resultado" value="<?php if($_POST){echo $_POST['resultado-5'];} ?>" required>
        </div>
        <input class="btn-result" type="submit" name="form-control" value="Validar Resultados">
    </form>

</body>
</html>