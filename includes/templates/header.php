<?php
if(!isset($_SESSION)) {
    session_start();
}
$auth=$_SESSION["login"] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de bienes raices">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="modo oscuro">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncio</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <a href="login.php">Sesion</a>
                        <?php if($auth): ?>
                            <a href="/admin">Admin</a>
                            <a href="cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif;?>
                    </nav>
                </div>
            </div><!--FinBarra-->
            <?php 
                if($inicio){
                    echo "<h1> Venta de casas y Departamentos Esclusivos de Lujo </h1>";
                }
            ?>
        </div>
    </header>