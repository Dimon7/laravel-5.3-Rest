<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextprojectsTable extends Migration
{
    /**
     * Run the migrations.
     * @table textprojects
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textprojects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->string('languageto', 5)->nullable();
            $table->string('languagefrom', 5)->nullable();

            $table->unique(["id"], 'unique_textprojects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('textprojects');
     }
}
