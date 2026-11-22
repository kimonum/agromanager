<?php

$dirName = __DIR__;
$biological = $dirName . "/../Biological.php";

if(file_exists($biological)){
    require_once($biological);
    echo "\nФайл |{$biological}| подключен!\n";
}else{
    echo "Ошибка в формировании адреса";
}

class Oak extends Biological
{
    protected function handleDeath(): void
    {
        echo "\nOak с ID:{$this->id} погиб.\n";
    }

    public function photosynthesize(): void
    {
        $this->changeHealth(2.0);
    }
}