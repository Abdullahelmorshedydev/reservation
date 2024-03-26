<?php

namespace App\Enums;

enum MovieStatusEnum: int
{
    case ACTIVE = 1;
    case DESACTIVE = 2;

    public static function values(): array
    {
        return [
            self::ACTIVE->value,
            self::DESACTIVE->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::ACTIVE => 'Active',
            self::DESACTIVE => 'DesActive',
        };
    }
}