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
        Schema::create('bookborrower', function ( $table) {
            $table->id();
            $table->bigInteger('borrower_id')->unsigned();
            $table->bigInteger('book_id')->unsigned();
            $table->enum('status',['i','r']);
            $table->timestamps();
        });
        Schema::table('bookborrower', function($table) {
            $table->foreign('borrower_id')
                ->references('id')->on('borrowerdetail')
                ->onDelete('cascade');
        });
        Schema::table('bookborrower', function($table) {
            $table->foreign('book_id')
                ->references('id')->on('books')
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
        Schema::dropIfExists('bookborrower');
    }
};
