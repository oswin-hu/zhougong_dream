<?php
/**
 * Author: oswin
 * Time: 2022/7/12-15:26
 * Description:
 * Version: v1.0
 */

namespace ZGDream;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use \Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\ProgressBar;

class ZGDream
{

    protected Filesystem $fileSystem;
    protected ProgressBar $bar;

    public function __construct(Filesystem $filesystem, ProgressBar $progressBar)
    {
        $this->fileSystem = $filesystem;
        $this->bar        = $progressBar;
    }

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

    /**
     * @param  bool  $createdTable  是否创建表
     * @return void
     * @throws FileNotFoundException
     */
    public function initData(bool $createdTable = true): void
    {
        $inserts = $this->importSql(__DIR__.'/../data/zg_dream.sql', $createdTable);
        if (!empty($inserts)) {
            $this->bar->setMaxSteps(count($inserts));
            foreach ($inserts as $insert) {
                DB::insert($insert);
                $this->bar->advance();
            }
            $this->bar->finish();
        }

    }

    /**
     * @param  string  $file
     * @param  bool  $createTale
     * @return array
     * @throws FileNotFoundException
     */
    private function importSql(string $file, bool $createTale = true): array
    {
        $sqlStr = $this->fileSystem->get($file);
        //纯sql内容
        $pure_sql = [];
        // 多行注释标记
        $comment = false;
        if (!empty($sqlStr)) {
            // 按行分割，兼容多平台
            $sql = str_replace(["\r\n", "\r"], "\n", $sqlStr);
            $sql = explode("\n", $sql);

            //循环处理每一行
            foreach ($sql as $key => $line) {
                //跳过空行或以#或--开头的单行注释或以/**/包裹起来的单行注释
                if ($line === '' || preg_match("/(#|--)/", $line) || preg_match("/^\/\*(.*?)\*\//", $line)) {
                    continue;
                }
                // 多行注释开始
                if (strpos($line, '/*') === 0) {
                    $comment = true;
                    continue;
                }

                // 多行注释结束
                if (substr($line, -2) === '*/') {
                    $comment = false;
                    continue;
                }

                // 多行注释没有结束，继续跳过
                if ($comment || $line === 'BEGIN;' || $line === 'COMMIT;') {
                    continue;
                }

                //sql语句

                if (strpos($line, 'INSERT INTO ') === 0) {
                    $time = date('Y-m-d H:i:s');
                    $line = substr($line, 0, -2).", '$time', '$time');";
                }
//                echo $line;
                $pure_sql[] = $line;
            }

            // 以数组形式返回sql语句
            $pure_sql = implode("\n", $pure_sql);
            $pure_sql = explode(";\n", $pure_sql);

            if ($createTale === false) {
                unset($pure_sql[0], $pure_sql[1], $pure_sql[2]);
            }
        }
        return $pure_sql;
    }
}
