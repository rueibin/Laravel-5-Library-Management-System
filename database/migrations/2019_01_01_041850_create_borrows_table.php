<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reader_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->date('borrow');
            $table->date('return');
            $table->dateTime('real_return')->nullable();
            $table->enum('returned', [1,2])->default('2')->comment('啟用，1=還書，2=未還書');
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
        Schema::dropIfExists('borrows');
    }
}
