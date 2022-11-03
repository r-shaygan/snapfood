<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->boolean('is_expired')->default(0);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->unsignedInteger('percent');
            $table->unsignedBigInteger('eatery_id');
            $table->timestamps();
            $table->foreign('eatery_id')->references('id')->on('eateries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
};
