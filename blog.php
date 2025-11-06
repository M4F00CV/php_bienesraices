<?php 
require 'includes/funciones.php';
incluirTemplate("header");
//Importar la conexion
require "includes/config/database.php"; 
$db=conectarDB();
//Consultar
$query="SELECT * FROM propiedades JOIN vendedores ON propiedades.vendedores_id = vendedores.id;";
$resultado=mysqli_query($db,$query);
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
        <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
            <article class="entrada-blog">
            <div class="imagen">
                <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">
            </div>

            <div class="texto-entrada">
                <a href="entrada.php?id=<?php echo $propiedad['id']; ?>">
                    <h4><?php echo $propiedad['titulo']; ?></h4> 
                    <p>Escrito el: <span><?php echo $propiedad['creado']; ?></span> por: <span><?php echo $propiedad['nombre']; ?></span> </p>

                    <p><?php echo $propiedad['descripcion']; ?></p>
                </a>
            </div>
        </article>
        <?php endwhile; ?>
        
    </main>

<?php incluirTemplate("footer");?>