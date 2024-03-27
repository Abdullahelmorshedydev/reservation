<?php

namespace App\Enums;

enum ShowtimeStatusEnum: int
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
            self::ACTIVE => __('web/admin/enums.active'),
            self::DESACTIVE => __('web/admin/enums.desactive'),
        };
    }
}