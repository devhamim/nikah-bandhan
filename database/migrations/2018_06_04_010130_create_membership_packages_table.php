<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('package_title')->nullable();
            $table->string('package_type')->nullable(); //bd, outside of bd
            $table->string('image_name')->nullable();
            $table->string('image_original_name')->nullable();
            $table->string('package_description')->nullable();
            $table->decimal('package_amount', 10, 2)
                  ->nullable();
            $table->string('package_currency')->nullable(); //bdt us
            $table->integer('package_duration')->nullable(); //day
            $table->integer('proposal_send_daily_limit')->default(0);
            $table->integer('proposal_send_total_limit')->default(0);
            $table->integer('contact_view_limit')->default(0);

            $table->integer('addedby_id')->unsigned()->default(1);
            $table->integer('editedby_id')->unsigned()->nullable();
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
        Schema::dropIfExists('membership_packages');
    }
}
