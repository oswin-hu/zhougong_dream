<?php
/**
 * Author: oswin
 * Time: 2022/7/12-15:26
 * Description:
 * Version: v1.0
 */

namespace ZGDream;

use Illuminate\Support\Facades\DB;

class ZGDream
{
    public function search(string $keyword): array
    {
        $rtn = [];
        if (!empty($keyword)) {
            $rtn = collect(DB::table('zg_dreams')->where('title', 'like', $keyword)->select(['id', 'title'])->get())->toArray();
        }
        return $rtn;
    }

    public function details(int $id): array
    {
        $rtn = [];
        if (!empty($id)) {
            $rtn = collect(DB::table('zg_dreams')->where(['id' => $id])->first())->toArray();
        }
        return $rtn;
    }

    public function initData():void{

    }
}
