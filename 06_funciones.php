<?php

//FUNCIONES (se cargan en memoria, esperando a ser llamada)

// echo saludar("Omar");
// echo "<br>";
// $saludoOmar = saludar("Omar");
// echo $saludoOmar;

// function saludar($nombre){
//     return "Hola $nombre !";

// }

$nombre = "Son-Goku";

echo "La variable es $nombre";
echo "<br>";

function indicarNombre () {
    global $nombre;
    return $nombre;
}

echo "La variable devuelta por la funcion es ".indicarNombre();
echo "<br>";


function mostrarAlumnos ($nombre, $apellido) {
    // MENSAJE QUE QUEREMOS DE SALIDA- AUTOINCREMENTAL 1. nombre apellido
    static $posicion = 1;
    echo "$posicion. $nombre $apellido <br>";
    $posicion++;
}

mostrarAlumnos("Son", "Goku");
mostrarAlumnos("Peter", "Parker");
mostrarAlumnos("Lois","Lane");

$indice = 1;
function mostrarAlumnosGlobal ($nombre, $apellido) {
    global $indice;
    echo "$indice. $nombre $apellido <br>";
    $indice++;
}

mostrarAlumnosGlobal("Son", "Goku");
mostrarAlumnosGlobal("Peter", "Parker");
mostrarAlumnosGlobal("Lois","Lane");



?>