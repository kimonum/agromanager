<?php

$dirName = __DIR__;
$equipment = $dirName . "/Equipment.php";

if(file_exists($equipment)){
    require_once($equipment);
    echo "\nФайл |{$equipment}| подключен!\n";
}else{
    echo "Ошибка в формировании адреса";
}

class Drone extends Equipment
{
    public function fly(float $distance): void
    {
        echo "\nDrone пролетел {$distance} м.\n";
    }
}