<?php
/**
 * Author: oswin
 * Time: 2022/7/18-15:28
 * Description:
 * Version: v1.0
 */

namespace Test;

use ZGDream\Facades\ZGDream;

class ZGDreamTest extends TestCase
{

    public function testSearch(): void
    {
        $list = ZGDream::search('亿万富豪');
        print_r($list);
        $this->assertTrue(true);
    }

    public function testDetails(): void
    {
        ZGDream::details(1);
        $this->assertTrue(true);
    }
}
