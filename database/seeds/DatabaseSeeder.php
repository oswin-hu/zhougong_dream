<?php

/**
 * Author: oswin
 * Time: 2022/7/12-16:53
 * Description:
 * Version: v1.0
 */

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
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
