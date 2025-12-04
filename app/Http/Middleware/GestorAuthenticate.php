<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class GestorAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('gestor.login');
        }
    }

    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard($this->guardName())->check()) {
            return $this->auth->shouldUse($this->guardName());
        }

        $this->unauthenticated($request, [$this->guardName()]);
    }

    /**
     * @return string
     */
    private function guardName() {
        return 'gestor';
    }
}
