<?php

namespace App\Util\Sessao;


/**
 *
 * @method static string id()
 *
 */
class Sessao
{
    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($name, $arguments)
    {
        return (self::resolveFacade('SessaoUtil'))->$name(...$arguments);
    }
}
