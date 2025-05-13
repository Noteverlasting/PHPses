<?php
/* NOTA IMPORTANTE PARA CALCULOS:
Valores que se asimilan como 'false':
 0, null, '', "" */

$num = 1;

// ELSE IF
if ( $num > 0){
    echo "la variable $num es mayor que 0";
} else if ($num < 0){
    echo "la variable $num es menor que 0";
} else {
    echo "la variable es 0";
}

echo "<br>";


//SWITCH (lo realizamos con 1 como cifra comparativa, porque 0 da respuestas booleanas)
switch ($num) {
    case $num > 1:
        echo "la variable $num es mayor que 1";
        break;
    case $num < 1:
        echo "la variable $num es menor que 1";
        break;
    default :
        echo "la variable es 1";
}
echo "<br>";

echo "****************************************************<br>";
echo "OPERADORES LOGICOS <br>";
echo "****************************************************<br>";
echo "and (y) -> $$ <br>";
echo "or (o) -> || <br>";
echo "not (n) -> != !== <br>";

$num1 = 15;
$num2 = 30;
echo "<br>";

if ($num1 == 10 && $num2 == 20) {
    echo "Se cumplen las dos condiciones";
} else if ($num1 == 10 || $num2 == 20) {
    echo "Una de las dos condiciones se cumple";
} else {
    echo "No se cumplen ninguna de las dos condiciones";
}

echo "<br>";





?>