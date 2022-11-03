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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cost');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('eatery_id');
            $table->unsignedBigInteger('status_id');
            $table->dateTime('ordered_at');
            $table->foreign('status_id')->on('statuses')->references('id')->onUpdate('cascade');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade');
            $table->foreign('eatery_id')->on('eateries')->references('id')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
