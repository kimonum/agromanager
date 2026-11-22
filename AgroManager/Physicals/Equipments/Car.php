<?php

$dirName = __DIR__;
$equipment = $dirName . "/Equipment.php";

if(file_exists($equipment)){
    require_once($equipment);
    echo "\\nФайл |{$equipment}| подключен!\\n";
}else{
    echo "Ошибка в формировании адреса";
}

class Car extends Equipment
{
    public function drive(float $distance): void
    {
        echo "\\nCar проехал {$distance} км.\\n";
    }
}
