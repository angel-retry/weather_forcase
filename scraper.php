<?php

$city = $_GET["city"];

// $city = str_replace(" ", "-", $city);

// $city = "london";

$apiKey = "c8f48c3adbe88b75f1f5918202ab6032";

$contents =  file_get_contents("https://api.openweathermap.org/data/2.5/forecast?q=".$city."&appid=".$apiKey."&lang=zh_tw");

$contents = json_decode($contents, true);

$cityName = $contents["city"]["name"];
$description = $contents["list"]["7"]["weather"][0]["description"];
$temperature = $contents["list"]["7"]["main"]["temp"] - 273;

$result = "城市: ".$city.", 天氣狀況: ".$description.", 溫度: ".$temperature."°C";


if($cityName != "") {
    echo $result;
}

?>