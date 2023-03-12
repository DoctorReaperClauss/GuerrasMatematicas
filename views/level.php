<?php include_once "../utils/level.validator.php" ?>
<?php include_once "../controllers/level.controller.php" ?>
<?php include_once "../utils/score.operation.php" ?>

<?php
$level = get_levels($_SESSION['level_id']);
$resultado_1 = '';
$resultado_2 = '';
$resultado_3 = '';
$resultado_4 = '';
$resultado_5 = '';
$resultados = '';
$mensaje_pista = '';
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
        if(!is_numeric($value)){
            return true;
        }
    }
}

function obtener_que_resultado_esta_mal($index){
    global $error;
    switch($index){
        case 0:
            array_push($error, "El ejercicio 1 es incorrecto");
            break;
        case 1:
            array_push($error, "El ejercicio 2 es incorrecto");
            break;
        case 2:
            array_push($error, "El ejercicio 3 es incorrecto");
            break;
        case 3:
            array_push($error, "El ejercicio 4 es incorrecto");
            break;
        case 4:
            array_push($error, "El ejercicio 5 es incorrecto");
            break;
        default:
            array_push($error, "El ejercicio 1 es incorrecto");
            break;
    }
}

function validar_resultados($array, $pista = false){
    global $level;
    $resultado_de_los_ejercicios = array(
            $level['EJERCICIO_1']["RESULTADO"],
            $level['EJERCICIO_2']["RESULTADO"],
            $level['EJERCICIO_3']["RESULTADO"],
            $level['EJERCICIO_4']["RESULTADO"],
            $level['EJERCICIO_5']["RESULTADO"]
    );
    for($i = 0; $i<sizeof($resultado_de_los_ejercicios); $i++){
        if($array[$i] == $resultado_de_los_ejercicios[$i]){
            continue;
        }
        else{
            if($pista == false){
                //en caso de que no se quiera obtener una pista para resolver el ejercicio
                //y se quiera unicamente validar si alguna esta malo
                obtener_que_resultado_esta_mal($i);
            }else{
                //si se quiere obtener la pista para el primer ejercicio no resuelto
                //se devuelve el identificador de ese ejercicio
                return $i;
            }
        }
    }
}

function obtener_pista($id_ejercicio){
    if($id_ejercicio == ""){
        return '';
    }
    global $level;
    $resultado_de_los_ejercicios = array(
            $level['EJERCICIO_1']["RESULTADO"],
            $level['EJERCICIO_2']["RESULTADO"],
            $level['EJERCICIO_3']["RESULTADO"],
            $level['EJERCICIO_4']["RESULTADO"],
            $level['EJERCICIO_5']["RESULTADO"]
    );
    $mensaje = "";
    //mensaje personalizado para cada ejercicio
    switch($id_ejercicio){
        case 0:
            $mensaje = "El resultado del ejercicio 1 es: $resultado_de_los_ejercicios[$id_ejercicio]";
            break;
        case 1:
            $mensaje = "El resultado del ejercicio 2 es: $resultado_de_los_ejercicios[$id_ejercicio]";
            break;
        case 2:
            $mensaje = "El resultado del ejercicio 3 es: $resultado_de_los_ejercicios[$id_ejercicio]";
            break;
        case 3:
            $mensaje = "El resultado del ejercicio 4 es: $resultado_de_los_ejercicios[$id_ejercicio]";
            break;
        case 4:
            $mensaje = "El resultado del ejercicio 5 es: $resultado_de_los_ejercicios[$id_ejercicio]";
            break;
        default:
            $mensaje = "hola";
            break;
    }
    operar_puntuacion("../database/math.db", "restar");
    return $mensaje;
}

if($_POST){
    //asignar valores a cada variable para poder mostrarselas al usuario
    //y que no tenga que reescribir todo una y otra vez
    $resultado_1 = $_POST['resultado-1'];
    $resultado_2 = $_POST['resultado-2'];
    $resultado_3 = $_POST['resultado-3'];
    $resultado_4 = $_POST['resultado-4'];
    $resultado_5 = $_POST['resultado-5'];

    $resultados = array($resultado_1, $resultado_2, $resultado_3, $resultado_4, $resultado_5);

    if($_POST['form-control'] == 'Validar Resultados'){
        //validaciones
        if(inputs_vacios($resultados)){
            array_push($error, "Hay ejercicios sin resolver, por favor resuelvalos todos antes");
        }
        if(inputs_no_numericos($resultados)){
            array_push($error, "Todos los datos deben ser numeros, por favor compruebe sus respuestas");
        }

        if(sizeof($error) == 0){
            //codigo para validar los resultados
            validar_resultados($resultados);

            //si despues de validar, no hay ningun ejercicio equivocado
            //entonces aplica la logica para sumar puntuacion
            if(sizeof($error) == 0){
                operar_puntuacion("../database/math.db", "sumar");
                desbloquear_siguiente_nivel($_SESSION['level_id'], "../database/math.db");
                header("location:main.php");
            }
        }

    }elseif($_POST['form-control'] == 'Canjear Pista (-1 Puntuación)'){
        //falta por implementar la logica de las pistas
        $id_del_ejercicio_no_resuelto = validar_resultados($resultados, $pista=true);
        $mensaje_pista = obtener_pista($id_del_ejercicio_no_resuelto);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/level.css">
    <link rel="shortcut icon" href="../public/imgs/perfil.jpg" type="image/x-icon">
    <title>Guerras Matemáticas</title>
</head>
<body>

    <form class="main-form" action="level.php", method="post">
        <div class="title">
            <h1>Ejercicios Prácticos</h1>
            <h2>Resuelve los ejercicios y obtén puntos</h2>
        </div>

        <p class="pista-log"><?php echo $mensaje_pista; ?></p>

        <!-- En caso de que haya(n) error(es), se mostrara(n) aqui -->
        <?php if(sizeof($error) != 0){ ?>
            <?php foreach ($error as $key => $value) { ?>
                <!-- va a generar una etiqueta p por cada error que haya -->
                <p class="error-log"> <?php echo $value; ?> </p>
            <?php } ?>
        <?php } ?>

        <div class="cards">
            <div class="card-ejercicio">
                <h2>Ejercicio 1</h2>
                <p class="ejercicio-p"><?php echo $level['EJERCICIO_1']["PROBLEMA"]; ?></p>
                <input class="result" type="text" name="resultado-1" placeholder="Coloque El Resultado" value="<?php echo $resultado_1; ?>">
            </div>
            <div class="card-ejercicio">
                <h2>Ejercicio 2</h2>
                <p  class="ejercicio-p"><?php echo $level['EJERCICIO_2']["PROBLEMA"]; ?></p>
                <input class="result" type="text" name="resultado-2" placeholder="Coloque El Resultado" value="<?php echo $resultado_2; ?>">
            </div>
            <div class="card-ejercicio">
                <h2>Ejercicio 3</h2>
                <p  class="ejercicio-p"><?php echo $level['EJERCICIO_3']["PROBLEMA"]; ?></p>
                <input class="result" type="text" name="resultado-3" placeholder="Coloque El Resultado" value="<?php echo $resultado_3; ?>">
            </div>
            <div class="card-ejercicio">
                <h2>Ejercicio 4</h2>
                <p  class="ejercicio-p"><?php echo $level['EJERCICIO_4']["PROBLEMA"]; ?></p>
                <input class="result" type="text" name="resultado-4" placeholder="Coloque El Resultado" value="<?php echo $resultado_4; ?>">
            </div>
            <div class="card-ejercicio">
                <h2>Ejercicio 5</h2>
                <p  class="ejercicio-p"><?php echo $level['EJERCICIO_5']["PROBLEMA"]; ?></p>
                <input class="result" type="text" name="resultado-5" placeholder="Coloque El Resultado" value="<?php echo $resultado_5; ?>">
            </div>
        </div>
        <div class="buttons">
            <input class="btn" type="submit" value="Canjear Pista (-1 Puntuación)" name="form-control">
            <input class="btn" type="submit" name="form-control" value="Validar Resultados">
        </div>
    </form>

</body>
</html>