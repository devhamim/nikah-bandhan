<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name')->nullable();
            $table->string('file_original_name')->nullable();
            $table->string('file_url')->nullable();
            $table->string('file_size')->nullable(); //in kb
            $table->string('file_width')->nullable();
            $table->string('file_height')->nullable();
            $table->string('file_ext')->nullable();
            $table->string('file_mime')->nullable();
            $table->boolean('autoload')->default(1);
            $table->boolean('checked')->default(0);
            $table->boolean('can_edit')->default(1);
            $table->integer('downloaded')->default(0);
            $table->integer('addedby_id')->unsigned()->default(1);
            $table->integer('editedby_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_cvs');
    }
}
