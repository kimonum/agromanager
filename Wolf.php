<?php

$dirName = __DIR__;
$biological = $dirName . "/../Biological.php";

if(file_exists($biological)){
    require_once($biological);
    echo "\nФайл |{$biological}| подключен!\n";
}else{
    echo "Ошибка в формировании адреса";
}

class Wolf extends Biological
{
    protected function handleDeath(): void
    {
        echo "\nWolf с ID:{$this->id} умер.\n";
    }

    public function bite(): void
    {
        $this->changeHealth(-5.0);
    }
}