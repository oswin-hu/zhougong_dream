<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZhougongDreamTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('zhougong_dream', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50)->comment('标题');
            $table->text('message')->comment('内容');
            $table->string('biglx', 20)->comment('大類');
            $table->string('smalllx', 20)->comment('小類');
            $table->string('zm', 3)->comment('字母');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('zhougong_dream');
    }
}