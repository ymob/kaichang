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

        //商品分类表
        Schema::create('goods_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typeName');
            $table->integer('pid');
            $table->string('path')->default('0');
            $table->tinyInteger('status')->default('1');
            $table->string('attrIds')->nullable();
        });

        //商品属性表
        Schema::create('goods_attrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('attrName');
            $table->string('valueIds')->nullable();
        });

        //商品属性值表
        Schema::create('goods_values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
        });

        //商品表
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sid');
            $table->string('title');
            $table->integer('phone');
            $table->string('license');
            $table->integer('typeId');
            $table->tinyInteger('status')->default('1');
        });

        //商品属性信息表
        Schema::create('goods_attrinfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid');
            $table->integer('goodAttrId');
            $table->integer('goodAttrValId');
        });

        //企业用户表(用户详情表)
        Schema::create('userdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->unique();
            $table->string('name')->unique();
            $table->integer('phone');
            $table->integer('postcode');
            $table->string('address');
            $table->string('license');
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        //加盟商详情表
        Schema::create('shopdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sid')->unique();
            $table->string('name')->unique();
            $table->integer('phone');
            $table->integer('postcode');
            $table->string('address');
            $table->string('license');
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        //订单表
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unique();
            $table->integer('sid');
            $table->integer('gid');
            $table->tinyInteger('status')->default('1');
            $table->integer('created_at');
            $table->integer('ended_at');
        });

        //评论表
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('gid');
            $table->longText('content');
            $table->tinyinteger('status')->default('1');
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        //购物车表
        Schema::create('shopcart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('gid');
            $table->integer('created_at');
        });

        //收藏夹表
        Schema::create('favorite', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('gid');
            $table->integer('created_at');
        });

        //加盟商轮播图表
        Schema::create('slideshow', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid');
            $table->string('title');
            $table->string('pic');
            $table->string('url');
        });

        //广告表
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->string('pic');
            $table->string('url');
        });

        //发票信息表
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('oid');
            $table->tinyInteger('type')->default('1');
            $table->string('title');
            $table->string('bank');
            $table->integer('bankNumber');
            $table->string('adderss');
            $table->integer('taxNumber');
            $table->integer('phone');
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
