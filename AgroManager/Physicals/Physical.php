<?php
$dirName = __DIR__;
$entity = $dirName . "/../Entity.php";

if (file_exists($entity)) {
    require_once($entity);
    echo "\nФайл |{$entity}| подключен!\n";
} else {
    echo "Ошибка в форматировании адреса";
}

/**
 * Абстрактный базовый класс для всех физических объектов в системе
 * Расширяет базовую сущность (Entity), добавляя понятие "износа" (wear)
 * Так как класс абстрактный, он не может быть инстанцирован напрямую
 */
abstract class Physical extends Entity
{
    //Добавили свойство веса
    public protected(set) float $weight;

    /**
     * Уровень износа объекта в процентах (от 0.0 до 100.0)
     * Используем Property Hooks для строгой инкапсуляции инварианта
     */
    public protected(set) float $wear = 0.0 {
    set(float $value) {
        if ($value < 0.0 || $value > 100.0) {
            throw new \OutOfRangeException(message: "Износ может принимать значения от 0 до 100");
        }
        //Явно указываем, что значение нужно сохранить в это же свойство
        $this->wear = $value; 
    }
}

    /**
     * Конструктор физического объекта.
     */
    public function __construct(string $id, string $name, float $weight) {
        parent::__construct($id, $name);
        $this->weight = $weight;
    }

    /**
     * Полный ремонт (восстановление) объекта
     * Сбрасывает износ до нуля
     */
    public function service(): Physical
    {
        $this->wear = 0.0;
        return $this;
    }

    /**
     * Контракт: любой физический объект должен уметь прикрепляться к другому.
     */
    abstract public function attachTo(Physical $physical): Physical;
}