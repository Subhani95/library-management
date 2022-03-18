<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function ( $table) {
            $table->id();
            $table->string('name');
            $table->enum('user_type',['admin','manager','staff'])->default('admin');
            $table->string('email');
            $table->string('phone');
            $table->binary('photo');
            $table->string('password');
            $table->enum('status',['pending','block','suspended','delete']);
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
        Schema::dropIfExists('users');
    }
};
