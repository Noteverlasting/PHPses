<?php
// Los comentarios en php se insertan asi:
# Esto tambien es un comentario, aunque no está recomendado
/* Comentario multilinea */

/* NOTA IMPORTANTE PARA CALCULOS:
Valores que se asimilan como 'false':
 0, null, '', "" */


// TIPOS DE VARIABLES
$unEntero = 2;
$unDecimal = 2.2;
$unString = "soy un string";
$unBooleano = true; //false

// LAS VARIABLES SON CASE SENSITIVE
$variable1 = "minusculas";
$VARIABLE1 = "MAYUSCULAS";

// CONCATENACION (se realiza con . o ,)
echo $variable1 . " " . $VARIABLE1;
echo "<br>";
echo $variable1, $VARIABLE1;
echo "<br>";
print $variable1;

$yo = "Omar";
echo "<br>";
$string1 = "Hola ".$yo;
echo $string1;
echo "<br>";
$string2 = "<h1>Hola $yo</h1>";
echo "<br>";
echo $string2;

// LAS COMILLAS SIMPLES SE USAN PARA VALOR LITERAL.
$string3 = 'Hola '.$yo;
echo "<br>";
echo $string3;
$string4 = 'Hola $yo';
echo "<br>";
echo $string4;
echo "<br>";


// CONSTANTES ( es preferible ponerlas en MAYUS. para diferenciarlas, aunque no llevan $)
// Constante local
const PI_1 = 3.1416;
// Constante global
define("PI_2",3.1416);

echo PI_1;
echo "<br>";
echo PI_2;
echo "<br>";


// HAY VARIACION DE TIPOS DE VALORES DEPENDIENDO SI SON NUMEROS O STRINGS COMO EN JS
$num1 = 100;
echo gettype($num1);
echo "<br>";
$num2 = "100";
echo gettype($num2);
echo "<br>";

// OTRA MANERA DE COMPROBAR EL TIPO DE DATO var_dump():
var_dump($num1);
echo "<br>";
// Sobretodo nos sirve para los arrays
$miArray = ['cerezas', 'fresas', 'nisperos'];
var_dump($miArray);
echo "<br>";
// Si no queremos tanta información, podemos optar por print_r()
print_r($miArray);
echo "<br>";

// ARRAY ASOCIATIVO (similar a objeto)
$arrayAsociativo = ["nombre" => "pepe", "edad" => 25];
// Otra forma: $arrayAsociativo = array("nombre" => "pepe", "edad" => 25);
var_dump($arrayAsociativo);
echo "<br>";
print_r($arrayAsociativo);
echo "<br>";

// COMO LLENAR UN ARRAY DE BASE VACIO
$array1 = [];
// Otra forma de crear un vacio o declarar es >> $array1 = array();
// Para añadir elementos nuevos al array:
$miArray[] = "ciruela";
echo "<br>";
$array1[] = "rojo";
$array1[] = "verde";
$array1[] = "azul";
var_dump($array1);
echo "<br>";
print_r($array1);
// Otra forma de añadir elementos nuevos al array:
array_push($array1, "amarillo");
echo "<br>";

echo "<br>";
echo "*********************************************************************************<br>";
// Signo +

$nume1 = 10;
$nume2 = 2;

echo "Concatenacion con punto: ".$nume1.$nume2;
echo "<br>";
echo "Suma con +: ".$nume1+$nume2;
echo "<br>";
echo "*********************************************************************************<br>";

// IF
if ($num1 == $num2){
    echo "cierto";
} else {
    echo "falso";
};
echo "<br>";
if ($num1 != $num2){
    echo "cierto";
} else {
    echo "falso";
};
echo "<br>";
if ($num1 === $num2){
    echo "cierto";
} else {
    echo "falso";
};
echo "<br>";
if ($num1 !== $num2){
    echo "cierto";
} else {
    echo "falso";
};
echo "<br>";










?>