<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\database\Eloquent\Model;


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
        //ajuste para banco de dados antigos
        Schema::defaultStringLength(191);
        //quebra de linha para text no blade
        //\Blade::setEchoFormat('nl2br(e(%s))');
        //Avisar sobre erros de excesso de consultas ao bd	
		Model::preventLazyLoading(! app()->isProduction());
    }
}
