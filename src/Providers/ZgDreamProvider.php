<?php
/**
 * Author: oswin
 * Time: 2022/7/14-11:55
 * Description:
 * Version: v1.0
 */

namespace ZGDream\Providers;

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
        if (class_exists('CreateZgDreamTable')) {
            $timestamp = date('Y_m_d_His');

            $this->publishes([
                __DIR__.'/../migrations/create_zg_dream_table.php.stub' => database_path("/migrations/{$timestamp}_create_zg_dream_table.php")
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
        $this->app->singleton('ZGDream', function () {
            return new ZGDream();
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
