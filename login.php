<?php 
//conexoin a la base
require 'includes/config/database.php';
$db=conectarDB();

//validar usuario
$errores=[];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // var_dump($_POST);
    $email=mysqli_real_escape_string($db,filter_var($_POST["email"],FILTER_VALIDATE_EMAIL));
    $password=mysqli_real_escape_string($db,$_POST["password"]);

    //validaciones
    if(!$email){ $errores[]= "El email es obligatorio o no es valido"; }
    if(!$password){ $errores[]= "El password es obligatorio o no es valido"; }

    if(empty($errores)){
        //REVISAR EXISTENCIA DEL USUARIO
        $query="SELECT * from usuarios where email = '${email}';";
        $resultado=mysqli_query($db,$query);

        //var_dump($query);
        if($resultado->num_rows){
            //Revisar existencia del pasword
            $usuario=mysqli_fetch_assoc($resultado);

            //Verificar si el password es correcto o nadotta
            $auth=password_verify($password,$usuario["password"]);
            if($auth){
                //usuario autenticado
                session_start();
                $_SESSION["usuario"]=$usuario["email"];
                $_SESSION["login"]=true;
                header("Location: /admin/index");
            }else{
                //usuario incorrecto
                $errores[]="Password incorrecto";
            }
        }else{
            $errores[]="El usuario no existe";
        }
    }
}

require 'includes/funciones.php';
incluirTemplate("header");
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sesion</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;?>
        <form class="formulario" method="POST" novalidate>
            <fieldset>
                <legend>Email y Password</legend>
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu password" id="password" required>    
            </fieldset>
            <input type="submit" value="Iniciar sesion" class="boton boton-verde">
        </form>
    </main>
<?php incluirTemplate("footer");?>