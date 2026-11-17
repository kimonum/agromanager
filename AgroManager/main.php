<?php

$dir = __DIR__;
$entity = $dir . '/Entity.php';
$Biological = $dir . '/Biologicals/Biological.php';

if (file_exists($entity)) {
    require_once $entity;
    echo "Файл '" . $entity . "' подключен";
}

if (file_exists($Biological)) {
    require_once $Biological;
    echo "Файл '" . $Biological . "' подключен";
}