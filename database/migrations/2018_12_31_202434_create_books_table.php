<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barcode',30)->comment('條碼'); 
            $table->string('name',30)->comment('書名');
            $table->string('image',30)->comment('圖片');
            $table->string('author',30)->comment('作者');
            $table->string('translator')->nullable()->comment('譯者');
            $table->integer('book_type_id')->unsigned()->comment('圖書類型id');
            $table->integer('publishing_id')->unsigned()->comment('出版社id');
            $table->integer('price')->unsigned()->comment('價格');
            $table->integer('page')->unsigned()->comment('裝訂／頁數');
            $table->integer('book_case_id')->unsigned()->comment('書架id');
            $table->integer('storage')->unsigned()->comment('數量');
            $table->date('publication_day')->comment('出版日');
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
        Schema::dropIfExists('books');
    }
}
