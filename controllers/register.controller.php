<?php

function info_valida(string $db, string $user, string $pass): bool
{
    $conexion = new DBOPERATION($db);

    //verificar que el usuario no exista ya
    $userExists = $conexion->retornar_resultado_de_busqueda("SELECT * FROM users WHERE user_name=:user", [$user]);
    if ($userExists) {
        return False;
    }
    return true;
}

function registrar_usuario(string $db, string $user, string $pass)
{
    if (!info_valida($db, $user, $pass)) {
        return 'El usuario ya existe';
    }

    $conexion = new DBOPERATION($db);
    //registrar el usuario
    $conexion->exec_query("INSERT INTO users VALUES(NULL, :user, :pass)", [$user, password_hash($pass, PASSWORD_BCRYPT)]);
}