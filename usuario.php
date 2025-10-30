<?php
//Creado y eliminado antes de mandar a produccion

//Importar la conexion
require 'includes/config/database.php';
$db=conectarDB();

//Crear un email y password
$correo="micorreo@correo.com";
$password="123456";

$password_hash=password_hash($password,PASSWORD_DEFAULT);

//query para crear al usuario
$query="INSERT into usuarios (email,password) values ('${correo}','${password_hash}') ; ";
//echo "$";

//agregar a la base de datos
mysqli_query($db,$query);
?>