<?php

function estaAutenticado() {
 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    return isset($_SESSION['usuario_id']);
}
function esModerador() {
    if (estaAutenticado() && isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'Moderador') {
        return true;
    }
    return false;
}

function esAdministrador() {
    if (estaAutenticado() && isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'Administrador') {
        return true;
    }
    return false;
}