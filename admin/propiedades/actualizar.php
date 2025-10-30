<?php 
//verificar logueo
require '../../includes/funciones.php';
if(!isset($_SESSION)) {
    session_start();
}
$auth=estaAutenticado();
if(!$auth){
    header("Location: /");
}
//ID obtenida desde index y validar por ID existente
$id=$_GET["id"];
$id=filter_var($id,FILTER_VALIDATE_INT);
if(!$id){header("Location:/admin");}

//BD
require "../../includes/config/database.php";
$db=conectarDB();

//obtener datos de la propiedad
$consulta="SELECT * from propiedades where id = ${id}";
$resultado=mysqli_query($db,$consulta);
$propiedad=mysqli_fetch_assoc($resultado);

//consulta para vendedores
$consulta_vendedores="SELECT * from vendedores";
$resultado_vendedores=mysqli_query($db,$consulta_vendedores);

//variables
$titulo=$propiedad["titulo"];
$precio=$propiedad["precio"];
$descripcion=$propiedad["descripcion"];
$habitaciones=$propiedad["habitaciones"];
$wc=$propiedad["wc"];
$estacionamientos=$propiedad["estacionamientos"];
$vendedores_id=$propiedad["vendedores_id"];
$imagenPropiedad=$propiedad["imagen"]; //no buena idea mandarla a elegir imagen directamente

//arreglo de errores
$errores=[];
if($_POST){
    //echo "<pre>";
    //var_dump($_POST);
    //echo "</pre>";
    //variables obtenidas de post
    $titulo=mysqli_real_escape_string($db, $_POST["titulo"]);
    $precio=mysqli_real_escape_string($db, $_POST["precio"]);
    $descripcion=mysqli_real_escape_string($db, $_POST["descripcion"]);
    $habitaciones=mysqli_real_escape_string($db, $_POST["habitaciones"]);
    $wc=mysqli_real_escape_string($db, $_POST["wc"]);
    $estacionamientos=mysqli_real_escape_string($db, $_POST["estacionamiento"]);
    $vendedores_id=mysqli_real_escape_string($db, $_POST["vendedor"]);
    $creado=date('Y/m/d');

    //obtener imagen
    $imagen=$_FILES["imagen"];

    if(!$titulo){$errores[]="El Ttitulo es obligatorio";}
    if(!$precio){$errores[]="El Precio es obligatorio";}
    if(strlen($descripcion)<50 ){$errores[]="La descricion es necesaria y debe ser mayor a 50 caracteres";}
    if(!$habitaciones){$errores[]="Las habitaciones es obligatorio";}
    if(!$wc){$errores[]="El baño es obligatorio";}
    if(!$estacionamientos){$errores[]="El estacionamiento es obligatorio";}
    if(!$vendedores_id){$errores[]="Los vendedores es obligatorio";}
    //if(!$imagen["name"]){$errores[]="La imagen es obligatorio";}

    //validar por tamaño de imagen 100kb
    $medida=1000*100; //para conversion de bytes a Kb
    if($imagen['size']>$medida || $imagen['error']){$error[]="La imagen es muy pesada";}
    
    if(empty($errores)){

        //Subida de arshivos
        $carpetaImages="../../imagenes/";
        if(!is_dir($carpetaImages)){mkdir($carpetaImages);}

        $nombreImagen = $propiedad['imagen'];

        //Comprobar si se subió una imagen nueva
        if($imagen['name']){
            //Borrar la imagen anterior
            unlink($carpetaImages . $propiedad['imagen']);

            //Generar nuevo nombre y mover la imagen nueva
            $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";
            move_uploaded_file($imagen['tmp_name'], $carpetaImages . $nombreImagen);
        }else{
            $nombreImagen=$propiedad['imagen'];
        }

        //query para mandar a la base
        $quey="UPDATE propiedades SET titulo='${titulo}',precio=${precio},descripcion='${descripcion}', imagen='${nombreImagen}',
            habitaciones=${habitaciones}, wc=${wc},estacionamientos=${estacionamientos}, vendedores_id=${vendedores_id} 
            Where id=${id}";

        $resultado=mysqli_query($db,$quey);
        if($resultado){header('Location:/admin?resultado=2');}
    }

    
}
incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin/index.php" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>
        <form action="" class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" 
                    value="<?php echo $titulo; ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad"
                    value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg,image/png,image/svg" name="imagen"
                    value="<?php echo $imagen; ?>">
                <img src="/imagenes/<?php echo $imagenPropiedad ?>" alt="Imagen de propiedad" class="imagen-small">

                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion de la propiedad</legend>
                <label for="habitaciones">Habitaciones</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1"
                    value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1"
                    value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1"
                |   value="<?php echo $estacionamientos; ?>">
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor" value="<?php echo $vendedores_id; ?>">
                    <option value="">--Seleccione--</option>
                    <?php while($row = mysqli_fetch_assoc($resultado_vendedores)): ?>
                        <option <?php echo $vendedores_id==$row['id'] ? 'selected' : '' ; ?> value="<?php echo $row['id']; ?>"> 
                            <?php echo $row['nombre'] . " " . $row['apellido']; ?> 
                        </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php incluirTemplate("footer");?>