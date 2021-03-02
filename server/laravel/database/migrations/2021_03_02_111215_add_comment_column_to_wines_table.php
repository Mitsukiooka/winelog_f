<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentColumnToWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wines', function (Blueprint $table) {
            $table->integer('color');
            $table->integer('taste');
            $table->integer('aroma');
            $table->text('comment');//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wines', function (Blueprint $table) {
            //
        });
    }
}
