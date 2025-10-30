<?php 
require 'includes/funciones.php';
incluirTemplate("header");
$id=$_GET['id']; 
$id=filter_var($id,FILTER_VALIDATE_INT);
if(!$id){
    header("Location: /");
}
//Importar la conexion
require "includes/config/database.php"; 
$db=conectarDB();

//Consultar
$query="SELECT * from propiedades where id= ${id}";


//obtener los resultaods
$resultado=mysqli_query($db,$query);
$propiedad=mysqli_fetch_assoc($resultado);

if($resultado->num_rows==0 || !$resultado->num_rows){
    header("Location: /");
}
?>


    <main class="contenedor seccion contenido-centrado">
        <h1> <?php echo $propiedad['titulo']; ?> </h1>

        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen de la propiedad">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo number_format($propiedad['precio']); ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamientos']; ?></p>
                </li>
                <li>
                    <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam maxime quia similique. Doloremque necessitatibus officiis architecto, veniam dolor sapiente aperiam tenetur, asperiores labore quo a consequatur aliquam! Voluptatibus, cupiditate. Voluptate.</p>
            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

<?php incluirTemplate("footer");
mysqli_close($db);
?>