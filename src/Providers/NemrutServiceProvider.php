<?php

namespace Nemrut\Providers;

use Illuminate\Support\ServiceProvider;
use Nemrut\Console\Commands\SocketServe;

class NemrutServiceProvider extends ServiceProvider
{

    protected $commands = ['SocketServe' => 'command.socket-serve'];

    public function boot()
    {
        Route::get('/socket', 'SocketController@handle');
    }

    public function register()
    {
        $this->app->singleton('command.socket-serve', function () {
            return new SocketServe();
        });
        $this->commands('command.socket-serve');
    }
}
