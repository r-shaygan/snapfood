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
        Schema::create('eateries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('type');
            $table->unsignedBigInteger('seller_id');
            $table->text('address_text');
            $table->decimal('address_long');
            $table->decimal('address_lat');
            $table->string('phone')->unique();
            $table->string('credit');
            $table->string('image');
            $table->integer('deliveryCost')->default(0);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->timestamps();
            $table->foreign('type')->references('id')->on('eatery_types')->onUpdate('cascade');
            $table->foreign('seller_id')->references('id')->on('sellers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eateries');
    }
};
