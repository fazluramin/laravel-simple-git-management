<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ip')->unique();
            $table->string('username');
            $table->string('password');
            $table->integer('port')->unsigned();
            $table->timestamp('created_at')->nullable();	
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_list');
    }
}
