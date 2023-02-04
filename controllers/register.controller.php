<?php

function infoValida(string $db, string $user, string $pass): bool
{
    $conexion = new DBOPERATION($db);

    //verificar que el usuario no exista ya
    $userExists = $conexion->return_search_result("SELECT * FROM users WHERE user_name=:user", [$user]);
    if ($userExists) {
        return False;
    }
    return true;
}

function registrarUsuario(string $db, string $user, string $pass)
{
    if (!infoValida($db, $user, $pass)) {
        return 'el usuario existe';
    }

    $conexion = new DBOPERATION($db);
    //registrar el usuario
    $conexion->exec_query("INSERT INTO users VALUES(NULL, :user, :pass)", [$user, password_hash($pass, PASSWORD_BCRYPT)]);
}