<?php

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFallowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fallows', function (Blueprint $table) {
           $table->primary(['user_id', 'fallowing_user_id']);
           $table->foreignId('user_id');
           $table->foreignId('fallowing_user_id');
           $table->timestamps();

           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

           
           $table->foreign('fallowing_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fallows');
    }
}
