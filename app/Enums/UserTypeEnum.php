<?php

namespace App\Enums;

enum UserTypeEnum: int
{
    case user = 0;
    case admin = 1;

    public function label(): string
    {
        return match ($this) {
            UserTypeEnum::user => 'user',
            UserTypeEnum::admin => 'admin',
        };
    }
}
