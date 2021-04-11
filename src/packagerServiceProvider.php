<?php

namespace splittlogic\packager;

use Illuminate\Support\ServiceProvider;

class packagerServiceProvider extends ServiceProvider
{

    /**
    * Publishes configuration file.
    *
    * @return  void
    */
    public function boot()
    {
      $this->loadRoutesFrom(__DIR__.'/routes/web.php');

      // Publishing is only necessary when using the CLI.
      if ($this->app->runningInConsole()) {
          $this->bootForConsole();
      }
    }

    /**
    * Make config publishment optional by merging the config from the package.
    *
    * @return  void
    */
    public function register()
    {
      $this->mergeConfigFrom(__DIR__.'/../config/packager.php', 'packager');

      // Register the service the package provides.
      $this->app->singleton('packager', function ($app) {
          return new packager;
      });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['packager'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/packager.php' => config_path('packager.php'),
        ], 'packager.config');
    }

}
