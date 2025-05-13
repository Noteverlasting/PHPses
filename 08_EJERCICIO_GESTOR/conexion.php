<?php

//PARA CONECTARSE (POR EJEMPLO) A UNA DB EN MYSQL, CAMBIAMOS PUERTO Y CONTRASEÑA -EN ESTE CASO-

$serverName = "localhost";
$database = "tareas_omar";
$port = 3307;
$user = "root"; // este user no se debe utilizar, es mejor definir un usuario que no sea el raiz.
$password = "CIEF1234";

try {
    $conn = new PDO ("mysql:host=$serverName;port=$port;dbname=$database", $user, $password);
    // echo "¡Conectado a $database! <br>";

    foreach ($conn -> query('SELECT * FROM tareas') as $fila) {
        // print_r($fila);
        // echo $fila['titulo'];
        // echo "<br>";

    }

} catch (PDOException $error){
    //SI FALLA, NOS INDICARÁ EL ERROR
    echo "Error $error";
}