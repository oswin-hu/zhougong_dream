<?php
/**
 * Author: oswin
 * Time: 2022/7/14-19:09
 * Description:
 * Version: v1.0
 */

namespace ZGDream\Facades;

use Illuminate\Support\Facades\Facade;

class ZGDream extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ZGDream';
    }
}
