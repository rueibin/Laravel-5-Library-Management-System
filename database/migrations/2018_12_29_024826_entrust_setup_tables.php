<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->unique();
            $table->string('display_name',30);
            $table->string('description',250)->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_manager', function (Blueprint $table) {
            $table->integer('manager_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('manager_id')->references('id')->on('manager')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['manager_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('pid');
            $table->string('name',30)->unique()->comment('權限');
            $table->string('slug',30)->unique()->comment('路由');
            $table->string('url',30)->nullable()->comment('路徑');
            $table->enum('menu',[1,2])->default('1')->comment('目錄，1:是，2不是');
            $table->string('display_name',30)->comment('權限中文名');
            $table->string('description',250)->nullable()->comment('描述');
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_manager');
        Schema::drop('roles');
    }
}
