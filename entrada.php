<?php 
require 'includes/funciones.php';
incluirTemplate("header");
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id) {
    header("Location: /");
}
//Importar la conexion
require "includes/config/database.php"; 
$db=conectarDB();
$query = "SELECT * FROM propiedades JOIN vendedores ON propiedades.vendedores_id = vendedores.id WHERE propiedades.id = ${id};";
$resultado = mysqli_query($db, $query);
$propiedad=mysqli_fetch_assoc($resultado); //dado que es solo un dato pues se queda en la variable
?>

    <main class="contenedor seccion contenido-centrado">

        <h1><?php echo $propiedad['titulo']; ?></h1>
        <picture>
            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span><?php echo $propiedad['creado']; ?></span> por: <span><?php echo $propiedad['nombre']; ?></span> </p>

        <div class="resumen-propiedad">
            <p class="propiedad-descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni aliquam magnam dolorum quisquam repellendus ipsam recusandae! Alias id, assumenda at optio quam accusamus quis laborum, delectus, nostrum aut est recusandae.</p>
            <p class="propiedad-descripcion"><?php echo $propiedad['descripcion']; ?></p>  
        </div>
    </main>

<?php incluirTemplate("footer");?>