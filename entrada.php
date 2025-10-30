<?php 
require 'includes/funciones.php';
incluirTemplate("header");
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni aliquam magnam dolorum quisquam repellendus ipsam recusandae! Alias id, assumenda at optio quam accusamus quis laborum, delectus, nostrum aut est recusandae.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, molestias ab enim officiis eligendi qui iusto voluptas? Veritatis, placeat quas. Dolores quibusdam magni ipsa, voluptas aut exercitationem pariatur similique nihil.</p>  
        </div>
    </main>

<?php incluirTemplate("footer");?>