<?php
namespace Database\Seeders;
/**
 * Author: oswin
 * Time: 2022/7/12-16:53
 * Description:
 * Version: v1.0
 */

use Illuminate\Database\Seeder as LaravelSeeder;


class DatabaseSeeder extends LaravelSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DreamTableSeeder::class);
    }
}
