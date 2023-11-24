<?php

namespace App\Constants;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;

abstract class AbstractAppConstant implements AppConstantInterface
{
    public static function all(): array
    {
        $constants = collect((new ReflectionClass(static::class))->getConstants());
        $values = collect();
        $constants->each(
            static function ($constant, $index) use ($values) {
                $values->put($constant, Str::title(str_replace('_', ' ', $index)));
            }
        );

        return $values->toArray();
    }

    public static function collect(): Collection
    {
        return collect(static::all());
    }

    public static function getTitle(string $name): string
    {
        $constants = static::all();

        return $constants[$name];
    }

    public static function getValues(): array
    {
        $constants = collect((new ReflectionClass(static::class))->getConstants());
        $values = collect();
        $constants->each(
            static function ($constant, $index) use ($values) {
                $values->put($index, $constant);
            }
        );

        return $values->toArray();
    }

    public static function getArray(): array
    {
        return array_map(function ($key, $value) {
            return (object) [
                'key' => $key,
                'value' => $value,
            ];
        }, array_keys(static::all()), array_values(static::all()));
    }
}
