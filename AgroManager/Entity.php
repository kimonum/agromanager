<?php
abstract class Entity {
    //Базовые публичные свойства, но с логикой внутри
    public string $id {
        set(string $value) {
            $trimmed = trim($value);
            if ($trimmed === '') {
                throw new \InvalidArgumentException("ID не может быть пустым");
            }
            $this->id = $trimmed;
        }
    }

    public string $name {
        set(string $value) {
            $trimmed = trim($value);
            if ($trimmed === '') {
                throw new \InvalidArgumentException("Именование не может быть пустым");
            }
            $this->name = $trimmed;
        }
    }

      public function __construct(string $id, string $name) {
        $this->id = $id; //Магия хуков сама вызовет проверку и trim()
        $this->name = $name; //И тут тоже
    }
}

// XD