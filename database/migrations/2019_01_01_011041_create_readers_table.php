<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->comment('姓名');
            $table->enum('gender', [1,2])->default('1')->comment('性別，1=男，2=女');
            $table->string('barcode',30)->comment('條碼');
            $table->string('tel', 10)->comment('電話');
            $table->string('mobile', 10)->comment('手機');
            $table->string('email', 50)->comment('email');
            $table->integer('borrow_book')->comment('可借圖書幾本');
            $table->enum('status', [1,2])->default('2')->comment('啟用，1=啟用，2=未啟用');
            $table->string('memo',250)->nullable()->comment('備註');
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
        Schema::dropIfExists('readers');
    }
}
