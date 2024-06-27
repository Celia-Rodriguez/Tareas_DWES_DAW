<?php 
    /**ENUNCIADO 
     *  Debes programar una aplicación para mantener una pequeña agenda en una única página web programada en PHP.
     * La agenda almacenará únicamente dos datos de cada persona: su nombre y un número de teléfono. Además, no podrá haber nombres repetidos en la agenda.
     * En la parte superior de la página web se mostrará el contenido de la agenda. En la parte inferior debe figurar un sencillo formulario con dos cuadros de texto, uno para el nombre y otro para el número de teléfono.
     *  Cada vez que se envíe el formulario:
     *      Si el nombre está vacío, se mostrará una advertencia.
     *      Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío, se añadirá a la agenda.
     *       Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono, se sustituirá el número de teléfono anterior.
     *      Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono, se eliminará de la agenda la entrada correspondiente a ese nombre.
     */
    /*Para guardar la agenda que vayamos generando necesitamos iniciar una sesión para que se guarde, sino cada vez que 
    le demos al botón para enviar los datos la agenda se reiniciará
    */
//Inicio de sesión
    session_start();
//VARIABLES se deben iniciar siempre o darán errores.
    $nombre="";
    $telefono="";
//La agenda es un array asociativo nombre => telefono
   // $agenda=array("Peter"=> "123123123", "Bruce"=>"888999555", "Steven"=>"000111222");
   $agenda=array(" "=>" ");

//VACIAR AGENDA
if(isset($_POST['Delete'])){
    session_unset();
}
//AÑADIR DATOS A LA AGENDA   
if(isset($_POST['name']) && !isset($_POST['Delete'])){//Primero comprobamos si han escrito el nombre en el formulario

    $nombre= trim($_POST['name']);//la función trim evita los espacios en blanco
    $telefono=trim($_POST['telfn']);

    if(!empty($nombre) ){//Si el nombre no esta vacio
        //comprobar si el nombre solo contiene letras y numeros
        if(preg_match("/^[a-zA-Z]+$/",$nombre)){
            
            //Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono, se eliminará de la agenda la entrada correspondiente a ese nombre.
            if(/*in_array($nombre, $_SESSION) &&*/ empty($telefono)){
                unset($_SESSION[$nombre]);
                $nombre ="";
            }//if
            //comprobación del nuemro de teléfono
           // if(preg_match("/^[0-9]{9}$/",$telefono)){ 
                //Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono, se sustituirá el número de teléfono anterior.
            if(in_array($nombre, $_SESSION) && !empty($telefono)){
                    $_SESSION[$nombre]=$telefono;
                    $nombre ="";
            }//if

                //Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío, se añadirá a la agenda.
            if(!in_array($nombre,$agenda) && !empty($telefono)){
                //Crea la variable SESSION que es una array y la combian consigo misma y con la agenda.
                $_SESSION  =array_merge($_SESSION, $agenda+=[$nombre => $telefono]);
                $nombre ="";
            }//if
            /*}//numero de telefono con numeros y 9 digitos
            else{
                echo "Número de teléfono incorrecto";
            }*/
       }else{//nombre escrito con caracteres especiales
            echo "Nombre incorrecto";
        }//escribir el nombre sin caractgeres especiales

    }else{//Si el nombre está vació o se ha escrito espacios en blanco saltará el siguiente mensaje

       echo"El nombre no puede estar vacio";

    }//empty name
    
}//isset
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAREA DWES02</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        body{
            margin-left: 50px;
        }
        header{
            padding: 20px;
            width: 20%;
            font-family: "Sofia", sans-serif;
            text-align: center;
        }  
        table{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 20%;
        }
        th {
            padding: 10px;
            text-align: left;
            background-color: Lavender;
        }
        td,th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        input{ font-family: Arial, Helvetica, sans-serif;}
        input[type=text], input[type=number]{
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        input[type=submit] {
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <header>
        <h1>Agenda</h1>
    </header>
    <body>
        <div>
<!-- AGENDA -->
    <?php 
        if (empty($_SESSION)){
            echo" <table>";
                echo"<tr>";
                    echo"<th>NOMBRE</th>";
                    echo" <th>TELÉFONO</th>";
                echo"</tr>";
                foreach($agenda as $x => $y){
                echo"<tr>";
                    echo "<td>".$x."</td>";
                    echo" <td>".$y."</td>";
                echo" </tr>"; 
                } 
            echo"</table>";
            echo"<br>";
        }//Session vacia se muestra la agenda normal

        if (!empty($_SESSION)){
            echo" <table>";
                echo"<tr>";
                    echo"<th>NOMBRE</th>";
                    echo" <th>TELÉFONO</th>";
                echo"</tr>";
                foreach($_SESSION as $x => $y){
                echo"<tr>";
                    echo "<td>".$x."</td>";
                    echo" <td>".$y."</td>";
                echo" </tr>"; 
                } 
            echo"</table>";
            echo"<br>";
        }//Session  no vacia se muestra la array de la sesion
    ?>
<!-- FROMULARIO -->
            <form action="#" method="post">
                <input type="text" name="name" id="name" placeholder="Nombre">
                <br>
                <input type="number" name="telfn" id="telfn" placeholder="Nº de Teléfono">
                <br>
                <input type="submit" value="Añadir">
                <input type="submit" name="Delete" value="Borrar Agenda">
            </form>
        </div>
    </body>
</html>