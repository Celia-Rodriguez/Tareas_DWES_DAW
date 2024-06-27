
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Agenda de contactos</title>

</head>

<body>

<?php

    if (isset($_POST['agenda'])) 

        $agenda = $_POST['agenda'];

    else

        $agenda = array();  // Creamos $agenda como un array vacío

    if ($_POST['action'] == "nuevo") {

        $nuevo_nombre = $_POST['nombre'];

        $nuevo_telefono = $_POST['telefono'];

        if (empty($nuevo_nombre))

            echo "<p style='color:red'>Debe introducir un nombre!!</p><br />";

        elseif (empty($nuevo_telefono))

            unset($agenda[$nuevo_nombre]);

        else  
        
            $agenda[$nuevo_nombre] = $nuevo_telefono;
    }

?>

    <!-- Mostramos los contactos de la agenda -->

    <h2>Agenda</h2>

<?php

    if (count($agenda) == 0)

        echo "<p>No hay contactos en la agenda.</p>";

    else {

        echo "<ul>";

        foreach( $agenda as $nombre => $telefono )

            echo "<li>".$nombre.': '.$telefono."</li>";

        echo "</ul>";

    }

?>

    <br/>

    <!-- Creamos el formulario de introducción de un nuevo contacto -->

    <h2>Nuevo contacto</h2>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
        
    <!-- Metemos los contactos ya existentes ocultos en el formulario -->

<?php

    foreach( $agenda as $id => $task ) {

          echo '<input type="hidden" name="agenda['.$id.']" ';

          echo 'value="'.$task.'"/>';

    }

?>

        <input type="hidden" name="action" value="nuevo"/>

        <label>Nombre:</label><input type="text" name="nombre"/><br />

        <label>Teléfono:</label><input type="text" name="telefono"/><br />

        <input type="submit" value="Añadir Contacto"/><br />

    </form>

    <br />



</body>

</html>

