<?php
error_reporting(0);

session_start();
require_once 'pdo_connection.php';


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <!-- TODA LA PARTE DE LAS META LA VAMOS A CORTAR PARA PONERLA COMO VARIABLE EN etiquetasMeta.php -->
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Aplicacion de colores de usuarios">
    <meta name="author" content="Omar">
    <meta name="keywords" content="colores, usuarios, php, mysql"> -->
     <?php include_once 'etiquetasMeta.php'; ?> 
    <title>Usuarios de 'colores'</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main>
        <form action="insert_user.php" method="post">
            <fieldset>
            <h1>Crear cuenta</h1>
        <div>
            <label for="usuario">Nombre:</label>
            <input type="text" name="usuario" id="usuario">
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password2">Repite la contraseña:</label>
            <input type="password" name="password2" id="password2">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="telefono">Telefono:</label>
            <input type="tel" name="telefono" id="telefono">
        </div>
        <div class="errorCuenta">
            <?php 
                if ($_SESSION['error']):
            ?>
            <p> Error en los datos </p>
            <?php endif; ?>
        </div>
        <div class="errorCuenta">
            <?php 
                if ($_SESSION['errorUser']):
            ?>
            <p> Usuario o contraseña incorrectos </p>
            <?php endif; ?>
        </div>
        <div class="botones">
            <button type="submit"> Enviar datos </button>
            <button type="reset"> Borrar datos </button>
        </div>
        <a href="index.php"> Volver</a>

        </fieldset>
        </form>
    </main>
</body>
</html>

<?php 
$_SESSION['error'] = false;
$_SESSION['errorUser'] = false;

?>