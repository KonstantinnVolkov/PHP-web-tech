<?php

class TemperatureInfo
{
    public static function printTemperature(string $city)
    {
        $temperature = array();

        $info= file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=". $city ."&units=metric&appid=67c7b650985884d025a03aa46189006f");
        $forecastArray=json_decode($info, true);
        $temperature[]=$forecastArray['main']['temp'];
        echo "1. T = " . $temperature[0] . "\n";

        $info= file_get_contents("http://api.weatherapi.com/v1/current.json?key=9b99114183494ba8b05155145222604&q=". $city ."&aqi=no");
        $forecastArray=json_decode($info, true);
        $temperature[]=$forecastArray['current']['temp_c'];
        echo "2. T = " . $temperature[1] . "\n";


        $info= file_get_contents("https://api.weatherbit.io/v2.0/current?city=" . $city . "&key=d673ba719ab5419f874a0edb4d8e81f9&include=minutely");
        $forecastArray=json_decode($info, true);
        $temperature[]=$forecastArray["data"][0]["temp"];
        echo "3. T = " . $temperature[2] . "\n";

        $info= file_get_contents("http://api.weatherstack.com/current?access_key=eccafbd46f6de4c6f4e15db065b0985d&query=" . $city);
        $forecastArray=json_decode($info, true);
        $temperature[]=$forecastArray["current"]["temperature"];
        echo "4. T = " . $temperature[3] . "\n";

        $result = 0;
        foreach ($temperature as $rec)
            $result += $rec;
        $result /= 4;

        echo "Result = " . $result . "\n";
    }
}

echo "Enter the name of the city: ";
$name = readline();
TemperatureInfo::printTemperature($name);

