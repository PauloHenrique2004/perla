<?php

namespace App\Util\Resize;


/**
 *
 * @method static make(string $fileName, int $width = 1000)
 *
 */
class Resize
{
    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($name, $arguments)
    {
        return (self::resolveFacade('ResizeUtil'))->$name(...$arguments);
    }
}
