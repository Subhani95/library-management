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
        Schema::create('books', function ($table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('bookShelf_id')->unsigned();
            $table->string('title',255);
            $table->string('author',255);
            $table->integer('total_books');
            $table->enum('status',['p','b','a','n','d'])->default('a');
            $table->integer('issued_books')->default(0);
            $table->integer('remaining_books');
            $table->timestamps();
        });
        Schema::table('books', function($table) {
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
        });
        Schema::table('books', function($table) {
            $table->foreign('bookShelf_id')
                ->references('id')->on('bookshelf')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
