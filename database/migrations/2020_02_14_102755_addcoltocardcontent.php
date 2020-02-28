<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addcoltocardcontent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('card-contents', function (Blueprint $table) {
            $table->string('cardCreatedBy');
            
            
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
        Schema::table('card-contents', function (Blueprint $table) {
            //
            $table->dropColumn('cardCreatedBy');
            
        });
    }
}
