<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_times', function (Blueprint $table) {
            $table->string('day');
            $table->time('open');
            $table->time('close');
            $table->unsignedBigInteger('eatery_id');
            $table->primary(array('day', 'eatery_id'));
            $table->foreign('eatery_id')->on('eateries')->references('id');
        });
        DB::statement('ALTER Table work_times add id INTEGER NOT NULL UNIQUE AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_times');
    }
};
