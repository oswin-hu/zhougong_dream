<?php
/**
 * Author: oswin
 * Time: 2022/7/12-15:26
 * Description:
 * Version: v1.0
 */

namespace ZGDream;

class ZGDream
{

    public function search(string $keyword): string
    {
        return $keyword;
    }

    public function details(int $id):string{
        return 'id:'.$id.'的详情';
    }
}
