<?php

//Блок подключения зависимостей
//Подключаем родительский класс Physical
$dirName = __DIR__;
$physical = $dirName . "/../../Physical.php";

if(file_exists($physical)) {
    require_once($physical);
    echo "\nФайл |{$physical}| подключен!\n";
}else{
    //Если родительского класса нет, класс Equipment не сможет быть создан
    echo "Ошибка в форматировании адреса (Physical.php)";
}

//Подключаем интерфейс PoweredInterface
$dirName = __DIR__;
$powered = $dirName . "/../../../Contracts/PoweredInterface.php";

if(file_exists($powered)) {
    require_once($powered);
    echo "\nФайл |{$powered}| подключен!\n";
}else{
    //Без интерфейса мы не сможем реализовать контракт заправки
    echo "Ошибка в форматировании адреса (PoweredInterface.php)";
}

abstract class Equipment extends Physical implements PoweredInterface
{
    /**
     * Уровень топлива (от 0.0 до 100.0)
     * 
     * Используем Property Hooks для контроля записи
     * Свойство доступно для чтения извне (public), но изменять его можно 
     * только внутри класса (protected(set))
     */
    public protected(set) float $fuelLevel = 0.0 {
        set(float $value) {
            //Явное присвоение необходимо, чтобы PHP понимал, 
            //что у свойства есть физическое хранилище (backing store), 
            //а не только логика. Иначе нельзя будет задать значение по умолчанию
            $this->fuelLevel = $value;
        }
    }

    /**
     * Возвращает текущий уровень топлива в процентах
     * Реализация метода из PoweredInterface
     */
    public function getPercentage(): float {
        return $this->fuelLevel;
    }

    /**
     * Заправка оборудования
     * Количество единиц топлива для добавления
     */
    public function refuel(float $units): void
    {
        //Защита": нельзя залить отрицательное топливо (это слив)
        if($units <= 0.0){
            throw new \InvalidArgumentException(message: "Значение может быть только положительным");
        }

        //Добавляем топливо, но не позволяем баку переполниться выше 100%
        //min(100.0, ...) гарантирует, что мы не превысим верхнюю границу
        $this->fuelLevel = min(100.0, $this->fuelLevel + $units);
    }

    /**
     * Переопределение метода ремонта (service) из Physical
     * 
     * Мы сужаем возвращаемый тип с Physical до Equipment. Это называется 
     * ковариантностью возвращаемого типа. Благодаря этому при вызове 
     * $equipment->service()->getPercentage() IDE будет знать, что возвращается 
     * именно Equipment, и не будет ругаться на несуществующий метод
     */
    #[\Override]
    public function service(): Equipment
    {
        //Вызываем ремонт родителя (он сбрасывает износ wear в 0.0)
        parent::service();
        
        //Возвращаем $this для поддержки цепочек вызовов
        return $this;
    }
}