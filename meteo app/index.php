<?php

$ciudad = "Barcelona";
$appid = "7b42076a65f2201a2b312c2d158874ac";
$units = "metric";
$lang = "es";

$URL = "https://api.openweathermap.org/data/2.5/weather?q=$ciudad&units=$units&lang=$lang&appid=$appid";
$URLP = "https://api.openweathermap.org/data/2.5/forecast?q=$ciudad&units=$units&lang=$lang&appid=$appid";

$data = file_get_contents($URL);
$jsonMeteo = json_decode($data, true);

// print_r($jsonMeteo);

$icono = $jsonMeteo["weather"][0]["icon"];
// echo $icono;



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My meteo</title>
    <link rel="stylesheet" href="css/meteo.css">
    <script src="js/meteo.js" defer></script>
</head>
<body>
    <header>
        <h1>My meteo</h1>
    </header>
    <main>
        <section>
        <!-- <form name="meteoForm">
            <fieldset>
                <legend id="titulo-formulario">Busca el tiempo en tu ciudad</legend>
        <label> Ciudad:
            <input type="text" name="city" id="city">
        </label>
        <br>
        <label> Idioma:
            <label>
                <input
                    type="radio"
                    name="lang"
                    value="es">
                    Español
            </label>
            <label>
                <input
                    type="radio"
                    name="lang"
                    value="ca">
                    Català
            </label>
            <label>
                <input
                    type="radio"
                    name="lang"
                    value="en">
                    English
            </label>
            <br>
            <button type="submit"> Busca </button>
            </label>
            </fieldset>
    </form>
    </section> -->
    <section>
        <fieldset id="muestreo">
            <legend id="previsionHoy">Previsión para hoy</legend>
        <div id="textosNow">
        <p id="description"></p>
        <p id="temp"></p>
        <p id="feels_like"></p>
        <p id="temp_min"></p>
        <p id="temp_max"></p>
        <p id="humidity"></p>
        <p id="speed"></p>
        <p id="sunrise"></p>
        <p id="sunset"></p>
        </div>
        <div id="iconNow">
            <img src="https://www.imelcf.gob.pa/wp-content/plugins/location-weather/assets/images/icons/weather-icons/<?php echo $icono?>.svg" alt="">
        </div>
    </fieldset>
    </section>
    <section >
        <fieldset id="muestreoprevis">
        <legend id="previsiones">Previsión próximos 4 dias</legend>
        
        <div id="iconDia1">
        <p id="day1"></p></div>

        <div id="iconDia2">
        <p id="day2"></p></div>

        <div id="iconDia3">
        <p id="day3"></p></div>
        
        <div id="iconDia4">
        <p id="day4"></p></div>
    </fieldset>
    </section>
    </main>
</body>
</html>