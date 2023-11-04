<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_contact_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alternative_email')->nullable();
            $table->string('alternative_mobile')->nullable();
            $table->string('convenient_time_to_call')->nullable();

            $table->string('name_of_contact_person')->nullable();
            $table->string('relation_with_contact_person')->nullable();
            $table->string('guardian_mobile')->nullable();
            $table->string('candidate_mobile')->nullable();
            $table->string('email')->nullable();

            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();

            $table->string('about_me')->nullable();
            $table->string('about_family')->nullable();
            
            $table->boolean('checked')->default(0);
            $table->boolean('can_edit')->default(1);
            $table->integer('user_id')->unsigned();
            $table->integer('addedby_id')->unsigned()->default(1);
            $table->integer('editedby_id')->unsigned()->nullable();

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
        Schema::dropIfExists('user_contact_infos');
    }
}
