<?php

namespace App\Providers;

use App\Util\Resize\ResizelUtil;
use App\Util\Sessao\SessaoUtil;
use App\Util\Thumbnail\ThumbnailUtil;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->app->singleton('ThumbnailUtil', function () {
            return new ThumbnailUtil();
        });

        $this->app->singleton('ResizeUtil', function () {
            return new ResizelUtil();
        });

        $this->app->singleton('SessaoUtil', function () {
            return new SessaoUtil();
        });

        $this->setPtBrLocale();
    }

    private function setPtBrLocale()
    {
        date_default_timezone_set('America/Sao_Paulo');
        setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
        setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
    }
}
