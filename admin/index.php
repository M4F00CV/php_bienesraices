<?php 
//Verificar conexion de usuario 
require '../includes/funciones.php';
if(!isset($_SESSION)) {
    session_start();
}
$auth=estaAutenticado();
if(!$auth){
    header("Location: /");
}

//Importar la base
require "../includes/config/database.php";
$db=conectarDB();

//escribir el query
$query="SELECT * from propiedades";

//consulta a la base
$resultadoConsula=mysqli_query($db,$query);

//
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id=$_POST["id"];
    $id=filter_var($id,FILTER_VALIDATE_INT);
    if($id){
        //Eliminar la consulta
        $query="SELECT imagen from propiedades where id=${id}";
        $resultado=mysqli_query($db,$query);
        $propiedad=mysqli_fetch_assoc($resultado);
        unlink("../imagenes/" . $propiedad["imagen"]);

        //Eliminar propiedad
        $query="DELETE from propiedades where id=${id}";
        $resultado=mysqli_query($db,$query);
        if($resultado){
            header("Location: /admin?resultado=3");
        }
    }
}

incluirTemplate("header");
$resultado=$_GET["resultado"]??null;
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if($resultado==1):?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif($resultado==2):?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif($resultado==3):?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!--Mostrar resultados-->
                <?php while($propiedad=mysqli_fetch_assoc($resultadoConsula)): ?>

                <tr>
                    <td> <?php echo $propiedad['id'] ?> </td>
                    <td> <?php echo $propiedad['titulo'] ?> </td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen'] ?>" class="imagen-tabla"></td>
                    <td> <?php echo $propiedad['precio'] ?> </td>
                    <td>
                        <form method="POST" class="w-100" action="">
                            <input type="hidden" name="id" value="<?php echo $propiedad["id"] ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>

                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php
//cerrar conexion
mysqli_close($db);

incluirTemplate("footer");
?>