<?php

//units=For temperature in Celsius use units=metric
//5128638 is new york ID

$url = "http://api.openweathermap.org/data/2.5/weather?id=1642907&lang=en&units=metric&APPID=3e7774a09299883c8419dd390034860e";
//$url = "http://samples.openweathermap.org/data/2.5/weather?id=2172797&appid=b1b15e88fa797225412429c1c50c122a1";
//$url = "http://samples.openweathermap.org/data/2.5/weather?id=1642907&appid=b1b15e88fa797225412429c1c50c122a1";

if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
    die('Not a valid URL');
}

$contents = file_get_contents($url);

if (!empty($contents)) {
    $clima = json_decode($contents);

    $temp_max = $clima->main->temp_max;
    $temp_min = $clima->main->temp_min;
    $icon = $clima->weather[0]->icon . ".png";
//how get today date time PHP :P
    $today = date("F j, Y, g:i a");
    $cityname = $clima->name;

    echo $cityname . " - " . $today . "<br>";
    echo "Temp Max: " . $temp_max . "&deg;C<br>";
    echo "Temp Min: " . $temp_min . "&deg;C<br>";
    echo "<img src='http://openweathermap.org/img/w/" . $icon . "'/ >";
}
?>

<div id="weather">
    <div id="weather-icon"></div>
    <div id="weather-captions"></div>    
</div>