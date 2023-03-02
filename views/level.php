<?php include_once "../utils/level.validator.php" ?>
<?php include_once "../controllers/level.controller.php" ?>

<?php
$level = get_levels($_SESSION['level_id']);
$resultado_1 = '';
$resultado_2 = '';
$resultado_3 = '';
$resultado_4 = '';
$resultado_5 = '';
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
        //asignar valores a cada variable para poder mostrarselas al usuario
        //y que no tenga que reescribir todo una y otra vez
        $resultado_1 = $_POST['resultado-1'];
        $resultado_2 = $_POST['resultado-2'];
        $resultado_3 = $_POST['resultado-3'];
        $resultado_4 = $_POST['resultado-4'];
        $resultado_5 = $_POST['resultado-5'];

        //validaciones
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
    }elseif($_POST['form-control'] == 'Canjear Pista'){
        //falta por implementar la logica de las pistas
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
            <input class="result" type="text" name="resultado-1" placeholder="Coloque El Resultado" value="<?php echo $resultado_1; ?>" required>
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 2</h2>
            <p><?php echo $level['EJERCICIO_2']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-2" placeholder="Coloque El Resultado" value="<?php echo $resultado_2; ?>" required>
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 3</h2>
            <p><?php echo $level['EJERCICIO_3']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-3" placeholder="Coloque El Resultado" value="<?php echo $resultado_3; ?>" required>
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 4</h2>
            <p><?php echo $level['EJERCICIO_4']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-4" placeholder="Coloque El Resultado" value="<?php echo $resultado_4; ?>" required>
        </div>
        <div class="card-ejercicio">
            <h2>Ejercicio 5</h2>
            <p><?php echo $level['EJERCICIO_5']["PROBLEMA"]; ?></p>
            <input class="result" type="text" name="resultado-5" placeholder="Coloque El Resultado" value="<?php echo $resultado_5; ?>" required>
        </div>
        <input class="btn-result" type="submit" name="form-control" value="Validar Resultados">
    </form>

</body>
</html>