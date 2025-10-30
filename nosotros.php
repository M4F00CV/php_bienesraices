<?php 
require 'includes/funciones.php';
incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    0.2 Años de experiencia
                </blockquote>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ut nobis, officiis cumque laboriosam nihil hic ipsa qui dolore ipsum iste officia minima id corporis vel aliquid! Dolor, ut omnis!
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic nisi ipsam sint? Saepe officia quod pariatur commodi voluptatem deserunt sapiente repellat minus libero debitis eos, blanditiis iste tempore fugiat ducimus!</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste dignissimos amet minus ipsa, ea dicta molestiae, aliquid, dolor placeat culpa illo ullam ducimus. Nemo eos ipsa alias ipsam, eligendi corrupti.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam nesciunt ab delectus saepe facilis eaque ipsam voluptatum! Repellat, ex corporis error ab dolores soluta obcaecati velit! Aut nihil quae eaque!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti neque impedit ex corporis. Obcaecati et aperiam veritatis, optio, exercitationem commodi quia amet ad quos iure corporis omnis, aliquid mollitia nesciunt.</p>
            </div>
        </div>
    </section>
<?php incluirTemplate("footer");?>