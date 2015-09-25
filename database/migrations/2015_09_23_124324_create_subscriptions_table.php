<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned();
            $table->integer('membership_id')->unsigned();
            $table->date('ends_on')->nullable();
            $table->integer('cost');
            $table->text('notes');
            $table->timestamps();
        });
        Schema::table('subscriptions', function(Blueprint $table){
          $table->foreign('member_id')->references('id')->on('members');
          $table->foreign('membership_id')->references('id')->on('memberships');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subscriptions');
    }
}
