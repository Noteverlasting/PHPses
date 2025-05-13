<?php

// EJERCICIO 1
// Vamos a tener una variable llamada edad
// Y otra variable con el nombre de la persona
// Hay que mostrar un mensaje que diga :
// Si es mayor de 18 "Eres mayor de edad desde hace X años"
// Si tiene 18 "Ya eres mayor de edad"
// Si aun no tiene 18 "Te faltan x años para ser mayor de edad"

$nombre = "Fulanito";
$edad = 17;

$edadcalc = $edad - 18;
$edadmenos = 18 - $edad;
// bucle if. Si la edad es mayor que 18 se muestra el primer mensaje, si es menos, el segundo, y en otro caso (si es 18), el tercero.
if ($edad > 18) {
    echo "Eres mayor de edad desde hace ".$edadcalc." años";
} else if ($edad < 18){
    echo "Te faltan $edadmenos años para ser mayor de edad";
} else {
    echo "Ya eres mayor de edad";
}

echo "<br>";

// EJERCICIO 2
// Dado un array tal que asi:
// [["cereza", 9.50], ["naranja", 2.50], ["platano", 4.35], ["kiwi", 5.60]["manzana", 2.25]]
// Se debe mostrar un mensaje que diga: "la fruta mas cara es..."
// Otro mensaje que diga: "el promedio de los precios es..."

echo "<br>";
$arrayFrutas = [["cereza", 9.50], ["naranja", 2.50], ["platano", 4.35], ["kiwi", 5.60], ["manzana", 2.25]];

$frutaMasCara = "";
$precioMasCaro = 0;
$sumaPrecios = 0;

// Iteramos sobre el array para encontrar la fruta más cara y calcular la suma de precios
foreach ($arrayFrutas as $fruta) {
    $nombre = $fruta[0];
    $precio = $fruta[1];

    // Si el precio actual es mayor que el precio más caro guardado, se actualizan ambos valores
    if ($precio > $precioMasCaro) {
        $precioMasCaro = $precio;
        $frutaMasCara = $nombre;
    }

    // Sumamos el precio actual a la suma total por cada fruta
    $sumaPrecios += $precio;
}

// Calculamos el promedio de los precios dividiendo la suma total por la cantidad de frutas.
$promedioPrecios = $sumaPrecios / count($arrayFrutas);

// Mostrar los resultados
echo "La fruta más cara es: $frutaMasCara con un precio de $precioMasCaro<br>";
echo "El promedio de los precios es: $promedioPrecios<br>";
echo "<br>";

// EJERCICIO 3
// Dado un array tal que asi:
$frutasTRES = [
    ["nombre" => "cerezas", "precio" => 9.50, "stock_kg" => 20],
    ["nombre" => "naranjas", "precio" => 2.50, "stock_kg" => 40],
    ["nombre" => "platanos", "precio" => 4.35, "stock_kg" => 35],
    ["nombre" => "kiwis", "precio" => 5.60, "stock_kg" => 10],
    ["nombre" => "manzanas", "precio" => 2.25, "stock_kg" => 25]
];

// Tenemos una fruteria y vamos a vender y comprar frutas.
// Necesitamos una función para vender fruta y otra para comprarlas.
// Cuando vendamos, la funcion venderFruta pedirá (fruta, cantidad) y debe actualizar el stock

function venderFruta($fruta, $cantidad) {
    // En php necesitamos indicar que estamos usando la variable global con esa palabra mismo "global"
    global $frutasTRES;
    // Creamos una variable para indicar que la fruta pedida no existe.
    $frutaEncontrada = false;
        // Con un bucle foreach iteramos por los objetos del array
    echo "****************************************************<br>";
    foreach ($frutasTRES as $clave => $valor) {
            // Si el nombre corresponde con una fruta, entraremos en un nuevo if después de indicar que la variable es true
        if ($valor['nombre'] === $fruta) {
        $frutaEncontrada = true;

            if ($valor['stock_kg'] >= $cantidad) {
            $frutasTRES[$clave]['stock_kg'] -= $cantidad;
            $precioFinal = $cantidad * $valor['precio'];
            echo "Venta de $fruta: $cantidad kg x {$valor['precio']}. Total: <strong>$precioFinal €</strong><br>";
            } else {
            echo "No hay suficiente stock de $fruta para vender $cantidad kg.<br>";
            }

        break;
        }   
    }    
    // Si la variable frutaEncontrada sigue siendo false, mostraremos un mensaje
    if (!$frutaEncontrada) {
    echo "Fruta '$fruta' no encontrada.<br>";
    }

    // Devolveremos, sea positiva o negativa la compra, los valores dentro del array.
    echo "<br>Inventario actualizado:<br>";
    foreach ($frutasTRES as $clave => $valor) {
        echo "<strong> {$valor['nombre']}</strong>, Precio: {$valor['precio']}, Stock: {$valor['stock_kg']} kg<br>";
    }
    echo "****************************************************<br>";
}

venderFruta("manzanas", 1);
echo "<br>";
venderFruta("melones", 1);
echo "<br>";
/*
OPCION CON BUCLE FOR EN LUGAR DE FOREACH

function venderFruta($fruta, $cantidad) {
    global $frutasTRES;
    $frutaEncontrada = false;

    // Usamos un bucle for para recorrer el array
    for ($i = 0; $i < count($frutasTRES); $i++) {
        if ($frutasTRES[$i]['nombre'] === $fruta) {
            $frutaEncontrada = true;

            if ($frutasTRES[$i]['stock_kg'] >= $cantidad) {
                $frutasTRES[$i]['stock_kg'] -= $cantidad;
                $precioFinal = $cantidad * $frutasTRES[$i]['precio'];
                echo "Venta de {$frutasTRES[$i]['nombre']}: $cantidad kg x {$frutasTRES[$i]['precio']}. Total: €$precioFinal<br><br>";
            } else {
                echo "No hay suficiente stock de {$frutasTRES[$i]['nombre']} para vender $cantidad kg.<br>";
            }
            break; // Salimos del bucle porque ya encontramos la fruta
        }
    }

    // Si la fruta no fue encontrada
    if (!$frutaEncontrada) {
        echo "Fruta '$fruta' no encontrada.<br><br>";
    }

    // Mostrar el estado actualizado del inventario
    foreach ($frutasTRES as $clave => $valor) {
        echo "$clave: Nombre: {$valor['nombre']}, Precio: {$valor['precio']}, Stock: {$valor['stock_kg']} kg<br>";
    }
}

*/

/* VERSION DE FERRAN
        CON UN RETURN (falta modificar $frutasTRES)
function venderFrutas ($frutasTRES, $nombreFruta, $cantidad) {
    $noHayFruta = true;
    foreach ($frutasTRES as $clave => $producto){
        // comprobamos si tenemos la fruta $nombreFruta
        if ($producto["nombre"] == $nombreFruta) {
            if ($producto["stock_kg"] >= $cantidad) {
                $stockActualizado = $frutasTRES[$clave]["stock_kg"] - $cantidad;
                $frutasTRES[$clave]["stock_kg"] = $stockActualizado;
                $precioFinal = $cantidad * $producto['precio'];
                echo "<br>";
                echo "Venta realizada. $nombreFruta: $cantidad kg x {$producto['precio']}. Total: <strong>$precioFinal €</strong><br>";
                echo "Stock actualizado de $nombreFruta: $stockActualizado";
            } else {
                echo "<br>";
                echo "No tenemos stock de $nombreFruta disponible. Nos quedan {$producto["stock_kg"]} kg";
            }
            $noHayFruta = false;
            break;
        }
    }
    if ($noHayFruta) {
        echo "<br>";
        echo "no tenemos la fruta $nombreFruta";
        echo "<br>";
    }
    return $frutasTRES
}




        VERSION CON & (mas sencilla)

function venderFrutas (&$frutasTRES, $nombreFruta, $cantidad) {
    $noHayFruta = true;
    foreach ($frutasTRES as $clave => &$producto){
        // comprobamos si tenemos la fruta $nombreFruta
        if ($producto["nombre"] == $nombreFruta) {
            if ($producto["stock_kg"] >= $cantidad) {
                $stockActualizado = $producto["stock_kg"] - $cantidad;
                $producto["stock_kg"] = $stockActualizado;
                $precioFinal = $cantidad * $producto['precio'];
                echo "<br>";
                echo "Venta realizada. $nombreFruta: $cantidad kg x {$producto['precio']}. Total: <strong>$precioFinal €</strong><br>";
                echo "Stock actualizado de $nombreFruta: $stockActualizado";
            } else {
                echo "<br>";
                echo "No tenemos stock de $nombreFruta disponible. Nos quedan {$producto["stock_kg"]} kg";
            }
        
            $noHayFruta = false;
            break;
        }
    }
    if ($noHayFruta) {
        echo "<br>";
        echo "no tenemos la fruta $nombreFruta";
        echo "<br>";
    }

    unset ($frutasTres);
    unset ($producto);
}

*/






// Cuando compremos, la funcion $comprarFruta pedira (fruta, cantidad, precio), pero si la fruta no está, la añadiremos.


function comprarFruta($fruta, $cantidad, $precio) {
    // En php necesitamos indicar que estamos usando la variable global con esa palabra mismo "global"
    global $frutasTRES;
    $frutaEncontrada = false;
    echo "****************************************************<br>";
    // Buscar si la fruta ya existe en el inventario
    foreach ($frutasTRES as $clave => $valor) {
        if ($valor['nombre'] === $fruta) {
            $frutaEncontrada = true;

            // Incrementar el stock de la fruta existente
            $frutasTRES[$clave]['stock_kg'] += $cantidad;

            // Ignorar el precio proporcionado y usar el precio existente
            echo "<strong>$fruta</strong>; se han añadido $cantidad kgs en nuestro inventario, pero el precio ({$valor['precio']}€) no se modificará. <br> Nuevo stock: <strong>{$frutasTRES[$clave]['stock_kg']} kg.</strong><br>";
            break;
        }
    }

    // Si la fruta no existe, añadirla al inventario con el precio proporcionado
    if (!$frutaEncontrada) {
        $frutasTRES[] = [
            "nombre" => $fruta,
            "precio" => $precio,
            "stock_kg" => $cantidad
        ];
        echo "La fruta <strong>$fruta</strong> no estaba en el inventario. <br>Se ha añadido con una cantidad de <strong>$cantidad kgs</strong> y un precio de <strong>$precio €/kg</strong>.<br>";
    }

    // Mostrar el inventario actualizado
    echo "<br>Inventario actualizado:<br>";
    foreach ($frutasTRES as $clave => $valor) {
        echo "<strong> {$valor['nombre']}</strong>, Precio: {$valor['precio']}, Stock: {$valor['stock_kg']} kg<br>";
    }
    echo "****************************************************<br>";
}

comprarFruta ("manzanas", 5, 80);
echo "<br>";
comprarFruta ("granadas", 5, 5.80);
echo "<br>";


/* VERSION DE FERRAN
function comprarFruta(&$frutasTRES, $nombreFruta, $cantidad, $precio){
    $frutaEncontrada = false;
    foreach ($frutas as &$producto) {

        if ($producto["nombre"] == $nombreFruta) {
        $producto["stock_kg"] += $cantidad;
        $producto["precio"] = $precio;
        echo "<br>";
        echo "Actualizada fruta $nombreFruta, con precio $precio € y cantidad {$producto["stock_kg"]} kg";
        break;
        }
    
    }

    if (!$frutaEncontrada) {
        $producto = ["nombre" => $nombreFruta, "precio" => $precio, "stock_kg" => $cantidad];
        $frutasTRES[] = $producto;
        echo "<br>";
        echo "Añadida la fruta $nombreFruta , con precio $precio €/kg y cantidad $cantidad kg.";
    }

    unset ($frutasTres);
    unset ($producto);
}

*/





function modificarPrecio($fruta, $precio){
    global $frutasTRES;
    $frutaEncontrada = false;
    echo "****************************************************<br>";
    foreach ($frutasTRES as $clave => $valor){
        if ($valor['nombre'] === $fruta) {
            $frutaEncontrada = true;
            $frutasTRES[$clave]["precio"] = $precio;

            echo "El nuevo precio de <strong>$fruta</strong> es <strong>$precio €/kg</strong><br>";
            break;
        }
    }

    if (!$frutaEncontrada) {
        echo "Fruta '$fruta' no encontrada.<br>";
    } 
    echo "****************************************************<br>";
}


modificarPrecio("manzanas", 2.95);






?>