<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('billing_address1');
            $table->string('billing_address2');
            $table->string('billing_address3');
            $table->string('billing_town');
            $table->string('billing_postcode');
            $table->string('rhif_ffon');
            $table->string('notes');
            $table->timestamps();
        });
        Schema::table('members', function(Blueprint $table){
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
