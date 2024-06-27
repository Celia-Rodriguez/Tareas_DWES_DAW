<?php
//INICIO DE SESSION
session_start();
//VARIABLES
$message="";
//SE utiliza $_REQUEST ya que almacena los datos de $_GET, $_POST y $_COOKIE
if(isset($_REQUEST['enviar'])){
    //Guardamos el valor de las preferencias elegidas
    $idioma= $_POST['idioma'];
    $perfil = $_POST['perfil'];
    $zone=$_POST['zone'];
    //le damos el valor al mesanje
    $message="Información guardada en la sesión";
    //creamos el usuario
    $_SESSION['user']="user";
    //creamos los cookies con las prefencias elegidas --- tiempo de duración 2 minutos
    setcookie("idioma",$idioma,time()+120);
    setcookie("perfil",$perfil,time()+120);
    setcookie("zone",$zone,time()+120);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias</title>
    <link rel="stylesheet" href="css/style.css">
</head>
 <body>
    <form action="preferencias.php" method="post">
        <fieldset>
           <legend>Preferencias</legend>
           <!-- MESAJE DE AVISO -->
           <div class="campo"><span class="mensaje"><?php echo $message;?></span></div>
           <!-- ELEGIR IDIOMA -->
            <label class="etiqueta" for="idioma" >Idioma:</label>
            <select name="idioma" id="idioma">
                <!-- Si el valor de la variable es igual al valor de input este se motrará como seleccionado -->
                <option value="Español" <?php if (isset($idioma) && $idioma=="Español"){echo "selected='selected'";}?>>Español</option>
                <option value="Inglés" <?php if (isset($idioma) && $idioma=="Inglés"){echo "selected='selected'";}?>>Inglés</option>
            </select>
            <br>
            <br>
            <!-- ELEGIR PERFIL PÚBLICO -->
            <label class="etiqueta" for="perfil">Perfil público:</label>
            <select name="perfil" id="perfil">
                <option value="yes" <?php if (isset($perfil) && $perfil=="Si"){echo "selected='selected'";}?>>Sí</option>
                <option value="no"<?php if (isset($perfil) && $perfil=="No"){echo "selected='selected'";}?>>No</option>
            </select>
            <br>
            <br>
            <!-- ELEGIR ZONA HORARIA -->
            <label class="etiqueta" for="zone">Zona horaria</label>
            <select name="zone" id="zone">
                <option value="GMT-2" <?php if (isset($zone) && $zone=="GMT-2"){echo "selected='selected'";}?>>GMT-2</option>
                <option value="GMT-1" <?php if (isset($zone) && $zone=="GMT-1"){echo "selected='selected'";}?>>GMT-1</option>
                <option value="GMT" <?php if (isset($zone) && $zone=="GMT"){echo "selected='selected'";}?>>GMT</option>
                <option value="GMT+1" <?php if (isset($zone) && $zone=="GMT+1"){echo "selected='selected'";}?>>GMT+1</option>
                <option value="GMT+2" <?php if (isset($zone) && $zone=="GMT+2"){echo "selected='selected'";}?>>GMT+2</option>
            </select>
            <br>
            <br>
            <input type="submit" value="Establecer Preferencias" name="enviar">
            <p><a href="mostrar.php">Mostrar Preferencias</a></p>
        </fieldset>
    </form>
</body>
</html>