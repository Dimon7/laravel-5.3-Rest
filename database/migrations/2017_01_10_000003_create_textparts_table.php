<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextpartsTable extends Migration
{
    /**
     * Run the migrations.
     * @table textparts
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textparts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 20)->nullable();
            $table->longText('body')->nullable();
            $table->integer('projectid')->unsigned()->nullable();
            $table->integer('userid')->unsigned()->nullable();

            $table->unique(["name", "id"], 'unique_textparts');


            $table->foreign('projectid', 'fk_textparts_textprojects_idx')
                ->references('id')->on('textprojects')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('userid', 'fk_textparts_users1_idx')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('textparts');
     }
}
