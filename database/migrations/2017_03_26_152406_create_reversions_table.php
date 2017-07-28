<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReversionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reversions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ask_id');
            $table->integer('answer_id');
            $table->integer('user_id');
            $table->text('content');
            $table->integer('goodpost');
            $table->integer('is_hidden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reversions');
    }
}
