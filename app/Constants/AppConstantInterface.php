<?php

namespace App\Constants;

interface AppConstantInterface
{
    public static function all(): array;

    public static function getTitle(string $name): string;
}
