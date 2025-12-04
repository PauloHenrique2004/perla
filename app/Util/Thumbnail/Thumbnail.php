<?php

namespace App\Util\Thumbnail;


/**
 *
 * @method static make(string $fileName, string $storageName)
 *
 */
class Thumbnail
{
    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($name, $arguments)
    {
        return (self::resolveFacade('ThumbnailUtil'))->$name(...$arguments);
    }
}
