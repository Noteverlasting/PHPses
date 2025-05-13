<?php
/* NOTA IMPORTANTE PARA CALCULOS:
Valores que se asimilan como 'false':
 0, null, '', "" */


// ARRAYS
// INDEXADO
$miArray = ['cerezas', 'fresas', 'nisperos'];
var_dump($miArray);
echo "<br>";
// Si no queremos tanta información, podemos optar por print_r()
print_r($miArray);
echo "<br>";
// Mostrar uno de los indices del array
echo $miArray[1];
echo "<br>";

// ARRAY ASOCIATIVO (similar a objeto)
$arrayAsociativo = ["nombre" => "pepe", "edad" => 25];
// Otra forma: $arrayAsociativo = array("nombre" => "pepe", "edad" => 25);
var_dump($arrayAsociativo);
echo "<br>";
print_r($arrayAsociativo);
echo "<br>";

// ARRAY MULTIDIMENSIONAL
$arrayMulti = [["cereza", 9.50], ["naranja", 2.50], ["platano", 4.35], ["kiwi", 5.60], ["manzana", 2.25]];


$num = 1;

// WHILE
while ($num < 5) {
    echo $num."<br>";
    $num++;
}
echo "<br>";

// DO WHILE
do {
    echo $num."<br>";
    $num++;
} while ($num < 5);
echo "<br>";

// BUCLE FOR
$miArray = ['cerezas', 'fresas', 'nisperos', 'ciruela'];

for ($i = 0; $i < count($miArray); $i++){
    echo "$i.$miArray[$i]"."<br>";
}
echo "<br>";
// BUCLE FOREACH

// Para indexados y multidimensionales, PERO NO asociativos
foreach ($miArray as $fruta){
    echo "$fruta <br>";
}
echo "<br>";
// Para arrays asociativos
foreach ($arrayAsociativo as $clave => $valor) {
    echo "$clave -> $valor<br>";
}




?>