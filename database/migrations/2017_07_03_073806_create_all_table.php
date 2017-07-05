<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*创建数据库中所有表*/

        //管理员表
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('password');
            $table->string('pic')->default('default.jpg');
            $table->string('remember_token')->unique();
            $table->tinyInteger('auth')->default('2');
            $table->tinyInteger('status')->default('1');
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        // 用户表
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('pic')->default('default.jpg');
            $table->string('remember_token')->unique();
            $table->tinyInteger('status')->default('1');
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        // 加盟商表
        Schema::create('shopkeepers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('pic')->default('default.jpg');
            $table->string('remember_token')->unique();
            $table->tinyInteger('status')->default('1');
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('admins');

        Schema::dropIfExists('users');
        
        Schema::dropIfExists('shopkeepers');
    }
}
