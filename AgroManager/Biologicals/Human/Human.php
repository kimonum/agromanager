<?php

$dirName = __DIR__;
$biological = $dirName . "/../../Biologicals/Biological.php";

if(file_exists($biological)){
    require_once($biological);
    echo "\nФайл |{$biological}| подключен!\n";
}else{
    echo "Ошибка в формировании адреса";
}

class Human extends Biological
{
    protected function handleDeath(): void
    {
        echo "\nHuman с ID:{$this->id} умер.\n";
    }

    public function eat(float $calories): void
    {
        $this->changeHealth($calories / 10.0);
    }
}