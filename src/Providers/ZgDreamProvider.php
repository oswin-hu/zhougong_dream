<?php
/**
 * Author: oswin
 * Time: 2022/7/14-11:55
 * Description:
 * Version: v1.0
 */

namespace ZGDream\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use ZGDream\ZGDream;

class ZgDreamProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        if (class_exists('CreateZgDreamTable') === false) {
            $timestamp = date('Y_m_d_His');

            $this->publishes([
                __DIR__.'/../../database/migrations/create_zg_dreams_table.php.stub' => database_path("/migrations/{$timestamp}_create_zg_dreams_table.php"),
                __DIR__.'/../../database/seeders/ZGDreamSeeder.php.stub' => database_path("/seeders/ZGDreamSeeder.php")
            ], 'laravel-zg-dream');
        }
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('ZGDream', function ($app) {
            return new ZGDream(new Filesystem());
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['ZGDream'];
    }
}
