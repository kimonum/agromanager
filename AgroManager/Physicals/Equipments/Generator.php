<?php

$dirName = __DIR__;
$equipment = $dirName . "/Equipment.php";

if(file_exists($equipment)){
    require_once($equipment);
    echo "\nФайл |{$equipment}| подключен!\n";
}else{
    echo "Ошибка в формировании адреса";
}

class PowerGenerator extends Equipment
{
    public function generate(float $hours): void
    {
        echo "\nGenerator работал {$hours} ч.\n";
    }
}