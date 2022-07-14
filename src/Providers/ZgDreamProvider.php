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

    public function boot(): bool
    {
        if (class_exists('CreateZgDreamTable')) {
            $timestamp = date('Y_m_d_His');

            $this->publishes([
                __DIR__.'/../migrations/create_zg_dream_table.php.stub' => database_path("/migrations/{$timestamp}_create_zg_dream_table.php")
            ]);
        }
    }

    public function register(): void
    {
        $this->app->singleton('ZGDream', function () {
            return new ZGDream();
        });
    }
}
