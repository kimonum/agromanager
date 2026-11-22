<?php

$dir = __DIR__;
//базовые классы и интерфейсы
$entity = $dir . '/Entity.php';
$Biological = $dir . '/Biologicals/Biological.php';

$humanFile = $dir . '/Biologicals/Human/Human.php';
$wolfFile = $dir . '/Biologicals/Animals/Wolf.php';
$oakFile = $dir . '/Biologicals/Plants/Oak.php';

$physical = $dir . '/Physicals/Physical.php';
$powered = $dir . '/Contracts/PoweredInterface.php';

$equipment = $dir . '/Physicals/Equipments/Equipment.php';

$carFile = $dir . '/Physicals/Equipments/Car.php';
$generatorFile = $dir . '/Physicals/Equipments/Generator.php';
$droneFile = $dir . '/Physicals/Equipments/Drone.php';

if (file_exists($entity)) {
    require_once $entity;
    echo "Файл '" . $entity . "' подключен\n";
}

if (file_exists($Biological)) {
    require_once $Biological;
    echo "Файл '" . $Biological . "' подключен\n";
}

if (file_exists($humanFile)) {
    require_once $humanFile;
    echo "Файл '" . $humanFile . "' подключен\n";
}

if (file_exists($wolfFile)) {
    require_once $wolfFile;
    echo "Файл '" . $wolfFile . "' подключен\n";
}

if (file_exists($oakFile)) {
    require_once $oakFile;
    echo "Файл '" . $oakFile . "' подключен\n";
}

if (file_exists($physical)) {
    require_once $physical;
    echo "Файл '" . $physical . "' подключен\n";
}

if (file_exists($powered)) {
    require_once $powered;
    echo "Файл '" . $powered . "' подключен\n";
}

if (file_exists($equipment)) {
    require_once $equipment;
    echo "Файл '" . $equipment . "' подключен\n";
}

if (file_exists($carFile)) {
    require_once $carFile;
    echo "Файл '" . $carFile . "' подключен\n";
}

if (file_exists($generatorFile)) {
    require_once $generatorFile;
    echo "Файл '" . $generatorFile . "' подключен\n";
}

if (file_exists($droneFile)) {
    require_once $droneFile;
    echo "Файл '" . $droneFile . "' подключен\n";
}

//Создание экземпляров классов
$human = new Human("BIO-001", "Человек");
$wolf = new Wolf("BIO-002", "Волк");
$oak = new Oak("BIO-003", "Дуб");

$car = new Car("EQ-001", "Автомобиль", 1500.0);
$generator = new PowerGenerator("EQ-002", "Генератор", 250.0);
$drone = new Drone("EQ-003", "Дрон", 2.5);

echo "\n--- Biological ---\n";

$human->changeHealth(-100.0);
$wolf->bite();
$oak->changeHealth(-100.0);

echo "\n--- Equipment ---\n";

$car->refuel(30.0);
$generator->refuel(50.0);
$drone->refuel(20.0);

$car->drive(10.0);
$generator->generate(2.0);
$drone->fly(100.0);

echo "\nCar fuel: " . $car->getPercentage() . "%\n";
echo "Generator fuel: " . $generator->getPercentage() . "%\n";
echo "Drone fuel: " . $drone->getPercentage() . "%\n";

$car->service();
$generator->service();
$drone->service();

echo "\nВсе экземпляры созданы и методы вызваны.\n";
