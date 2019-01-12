<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->increments('id')->comment('流水號');
            $table->string('username',20)->comment('使用者帳號');
            $table->string('password')->comment('使用者密碼');
            $table->enum('gender',[1,2])->default('1')->comment('性別，1=男，2=女');
            $table->string('mobile',10)->comment('手機');
            $table->string('email',50)->comment('email');
            $table->enum('status',[1,2])->default('2')->comment('啟用，1=啟用，2=未啟用');
            $table->rememberToken()->comment('記錄登入狀態');
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
        Schema::dropIfExists('manager');
    }
}
