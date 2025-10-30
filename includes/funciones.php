<?php
require 'app.php';

function incluirTemplate(string $nombre, bool $inicio=false){
    include TEMPLATES_URL . "/${nombre}.php"; 
}

function estaAutenticado():bool{
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $auth=$_SESSION["login"]; 
    if(!$auth){
        return false;
    }
    return true;
}