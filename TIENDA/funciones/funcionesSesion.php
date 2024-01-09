<?php

function estaAutenticado() {
 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['usuario_id']);
}
function esModerador() {
    return estaAutenticado() && isset($_SESSION['perfil']) && strcasecmp($_SESSION['perfil'], 'Moderador') == 0;
}

function esAdministrador() {
    return estaAutenticado() && isset($_SESSION['perfil']) && strcasecmp($_SESSION['perfil'], 'Administrador') == 0;
}