<?php
function conectarDB():mysqli{
    $db=mysqli_connect('localhost','root','','bienesraices_crod');
    if(!$db){
        echo "Configuracion de DB incorrecta";
        exit;
    }
    return $db;
}