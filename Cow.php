<?php

$dirName = __DIR__;
$biological = $dirName . "/../Biological.php";

if(file_exists($biological)){
    require_once($biological);
    echo "\nФайл |{$biological}| подключен!\n";
}else{
    echo "ошибка в форматировании адреса";
}

$dirName = __DIR__;
$feedable = $dirName . "/../../Contracts/FeedableInterface.php";

if(file_exists($feedable)){
    require_once($feedable);
    echo "\nФайл |{$feedable}| подключен!\n";
}else{
    echo "ошибка в форматировании адреса";
}

final class Cow extends Biological implements FeedableInterface
{
    //Константа для набора веса (1 кг еды = 0.5 кг веса)
    private const WEIGHT_GAIN_COEFFICIENT = 0.5;

    /**
     * Вес коровы. Снаружи можно только читать, менять только внутри класса
     */
    public private(set) float $weightKg {
        set(float $value){
            if($value <= 0.0){
                throw new \InvalidArgumentException(message: "Вес - это положительная величина");
            }
            //Сохранит возвращаемое значение автоматически
        }
    }
    
    /**
     * Виртуальное свойство: вычисляется динамически на основе здоровья
     * Если здоровье больше 50, корова считается здоровой
     */
    public bool $isHealthy{
        get => $this->health > 50.0;
    }

    public function __construct(string $id, string $name, float $initialWeight)
    {
        parent::__construct($id, $name);
        $this->weightKg = $initialWeight;
    }

    /**
     * Реализация кормления
     */
    public function feed(float $kg): void
    {
        if($kg <= 0.0){
            throw new \InvalidArgumentException(message: "Недостаточно корма");
        }

        // Увеличиваем вес
        $this->weightKg += ($kg * self::WEIGHT_GAIN_COEFFICIENT);
        
        // Увеличиваем здоровье через метод родителя (безопасно, с лимитами)
        $this->health = min(100.0, $this->health + 2.0);
    }

    #[\Override]
    protected function handleDeath(): void
    {
        echo "Животное с ID:{$this->id} отправлено на колбасу\n";
    }
}