<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addcoltonotifies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('notify', function (Blueprint $table) {
            $table->string('content');
            $table->string('list_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('notify', function (Blueprint $table) {
            //
            $table->dropColumn('content');
            $table->dropColumn('list_id');
        });
    }
}
