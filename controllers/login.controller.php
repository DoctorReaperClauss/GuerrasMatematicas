<?php

function login(string $db, string $user, string $password)
{
    $conexion = new DBOPERATION($db);

    $userExists = $conexion->return_search_result("SELECT * FROM users WHERE user_name=:user", [$user]);

    //si el usuario no existe, directamente salte de la funcion
    if (!$userExists) {
        return 'El usuario no existe';
    }
    $password_comparation = password_verify($password, $userExists[0]['user_pass']);

    //si las contraseñas no coinciden, salte
    if(!$password_comparation){
        return "La contraseña no coincide";
    }

    return "loggin con exito";

}

?>