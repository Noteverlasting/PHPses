<?php

// Llamamos al fichero de conexión
require_once 'conexion.php';

// print_r($_POST);
// echo "<br>";
// echo $_POST['usuario'];
// echo "<br>";
// echo $_POST['color'];

// PARA "TRADUCIR" LOS COLORES DEL FORMULARIO
// LLAMAMOS A LOS COLORES DEL ARRAY DE traduccionColores.php

require_once 'traduccionColores.php';
// SEGURIDAD PHP -- AÑADIDOS:
// SEGURIDAD PHP --  Creamos un inicio de sesion
session_start();
// SEGURIDAD PHP -- if para que compare que el numero generado en sessionToken por $_SESSION sea el mismo que el sessionToken generado por $_POST
// SEGURIDAD PHP -- Si no se ha accedido por el formulario (que devuelve el mismo valor de sessionToken), la variable errorSesion se hace true
// SEGURIDAD PHP -- y ademas se redirige al usuario a la página de inicio.
if (!isset($_SESSION['sessionToken'])) {
    $_SESSION['errorSesion'] = true;
    header('location:index.php');
}


if (!hash_equals($_SESSION['sessionToken'], $_POST['sessionToken'])) {
    
    die("Token inválido"); // para pruebas
}
// HoneyPot
if (!empty($_POST['web'])) {
    die("bot detectado");
}


// LO TRANSFORMAMOS EN UN TRY CATCH YA QUE IF DEVUELVE ERROR

// try {
//     hash_equals($_SESSION ['sessionToken'], $_POST['sessionToken']);
// } catch (Exception $e){
//     $_SESSION['errorSesion'] = true;
//     header("location: index.php");
// }




// SEGURIDAD PHP -- AÑADIDOS:

// SEGURIDAD PHP -- Creamos variables con trim para que no haya espacios
$user = trim($_POST['usuario']);
$color = trim($_POST['color']);

// SEGURIDAD PHP -- if para considerar varias opciones erroneas, le indicamos que si se dan vuelva a index.php y finalice el formulario
if (empty($user) || empty($color)){
    header("location: index.php");
    exit();
}


//DECLARAMOS EL INSERT
$insert = "INSERT INTO colores (color, usuario) VALUES (?, ?);";
//PREPARAMOS COMO FUNCIONARÁ EL INSERT
$insertPrepare = $conn -> prepare($insert);

// $insertPrepare -> execute([$_POST['color'], $_POST['usuario']]);
// ESTA OPCION ES PARA EJECUTAR CON EL ARRAYCOLORS -que hemos añadido despues-
// $insertPrepare -> execute([$arrayColors[$_POST['color']], $_POST['usuario']]);
// SEGURIDAD PHP -- Variamos el execute para que considere las nuevas variables
$insertPrepare -> execute([$arrayColors[$color], $user]);
//PARAMOS EL PREPARE Y LA CONEXION
$insertPrepare = null;
$conn = null;

//VOLVEMOS A LA PAGINA DE ORIGEN
header("location: index.php");



?>
