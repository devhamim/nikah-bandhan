<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->default('pending'); //pending, checked, paid,
            $table->integer('membership_package_id')->nullable();
            $table->string('package_title')->nullable();
            $table->string('package_description')->nullable();
            $table->decimal('package_amount', 10, 2)
                  ->nullable();
            $table->string('package_currency')->nullable(); //bdt us
            $table->string('package_duration')->nullable(); //day

            $table->decimal('paid_amount', 10, 2)
                  ->nullable();
                  
            $table->string('paid_currency')->nullable();

            $table->string('payment_method')->nullable(); 
            //bkash, rocket, bank account, money gram, western uninon

            $table->text('payment_details')->nullable();

            $table->string('admin_comment')->nullable();

            $table->string('wm_token')->nullable();
            //walletmix_token

            $table->integer('user_id')->unsigned();

            $table->integer('addedby_id')
                  ->unsigned();
            $table->integer('editedby_id')
                  ->unsigned()
                  ->nullable();
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
        Schema::dropIfExists('user_payments');
    }
}
