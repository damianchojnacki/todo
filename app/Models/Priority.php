<?php

namespace App\Models;

enum Priority: int
{
    case LOW = 0;
    case NORMAL = 1;
    case HIGH = 2;

    public static function values()
    {
        return collect(self::cases())->map->value->toArray();
    }

    public function getDisplayName(): string
    {
        return match ($this){
            self::LOW => 'Niski',
            self::NORMAL => 'Normalny',
            self::HIGH => 'Wysoki',
        };
    }
}
