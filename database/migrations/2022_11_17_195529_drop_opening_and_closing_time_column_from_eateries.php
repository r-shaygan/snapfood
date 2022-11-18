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
        if (Schema::hasColumn('eateries', 'phone'))
        {
            Schema::table('eateries', function (Blueprint $table)
            {
                $table->dropColumn('opening_time');
                $table->dropColumn('closing_time');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eateries', function (Blueprint $table) {
            //
        });
    }
};
