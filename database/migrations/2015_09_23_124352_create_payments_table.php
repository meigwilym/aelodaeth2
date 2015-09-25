<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscription_id')->unsigned();
            $table->integer('payment_method_id')->unsigned();
            $table->integer('amount');
            $table->timestamps();
        });
        Schema::table('payments', function(Blueprint $table){
          $table->foreign('subscription_id')->references('id')->on('subscriptions');
          $table->foreign('payment_method_id')->references('id')->on('payment_methods'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
