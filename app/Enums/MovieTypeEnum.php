<?php

namespace App\Enums;

enum MovieTypeEnum: int
{
    case ACTION = 1;
    case ROMANTIC = 2;

    public static function values(): array
    {
        return [
            self::ACTION->value,
            self::ROMANTIC->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::ACTION => __('web/admin/enums.action'),
            self::ROMANTIC => __('web/admin/enums.romantic'),
        };
    }
}