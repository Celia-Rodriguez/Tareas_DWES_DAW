<?php
//INICIO DE SESSION
session_start();
//VARIABLES
$message="";
$idioma="";
$perfil="";
$zone="";
//Comprobamos si existe el usuario que hemos creado en preferencias.php, sino aparecerán vacias las preferncias
if(isset($_SESSION['user'])){
    //comprobamos la existencia de las cookies creadas en preferencias.php
    if(isset($_COOKIE['idioma'])){
        $idioma=$_COOKIE['idioma'];
    }
    if(isset($_COOKIE['perfil'])){
       $perfil=$_COOKIE['perfil'];
    }
    if(isset($_COOKIE['zone'])){
        $zone=$_COOKIE['zone'];
    }
}else{
    $message="Sesión no iniciada";
}
//BORRAR valores de las variables
if(isset($_POST['borrar'])){
    //mensaje de aviso
    $message="Información de la sesión eliminada";
    //reinicio de variables
    $idioma="";
    $perfil="";
    $zone="";
    //Destruccion de la session
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="mostrar.php" method="post">
        <fieldset>
           <legend>Preferencias</legend>
           <div class="campo"><span class="mensaje"><?php echo $message;?></span></div>
            <label class="etiqueta" for="idioma">Idioma:</label>
            <p class="texto"><?php echo $idioma; ?></p>

            <label class="etiqueta" for="perfil">Perfil público:</label>
            <p class="texto"><?php echo $perfil; ?></p>
     
            <label class="etiqueta" for="zone">Zona horaria</label>
            <p class="texto"><?php echo $zone; ?></p>
            <input type="submit" value="Borrar Preferencias" name="borrar">
            <p><a href="preferencias.php">Establecer Preferencias</a></p>
        </fieldset>
    </form>
</body>
</html>