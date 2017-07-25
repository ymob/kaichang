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
            // 0：超级管理员 1：普通管理员
            $table->tinyInteger('auth')->default('1');
            // 0：禁用 1：启用
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
            $table->string('phone')->unique();
            $table->string('pic')->default('default.jpg');
            $table->string('remember_token')->unique();
            // 0：禁用 1：启用
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
            $table->string('phone')->unique();
            $table->string('pic')->default('default.jpg');
            $table->string('remember_token')->unique();
            // 0：禁用，1：正常，2：没有详情，3：详情没有通过；
            $table->tinyInteger('status')->default('2');
            $table->integer('created_at');
            $table->integer('updated_at');
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
            $table->string('phone');
            $table->integer('postcode');
            $table->string('address');
            $table->string('license');
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        //订单表
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->integer('pid')->nullable();
            $table->integer('mid');
            $table->string('fids')->nullable();
            $table->integer('stime');
            $table->integer('ltime');
            $table->decimal('price', 10, 2);
            // 1：商家未接单 2：未付款 3：交易中 4：交易完成 5：交易终止
            $table->tinyInteger('status')->default('1');
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        // 订单商品表
        Schema::create('order_goods', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('oid');
            $table->integer('gid');
            $table->string('g_aids');
            $table->string('g_vids');
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
            $table->integer('mid');     //会场 id
            $table->string('fids')->nullable();     //配套服务 id 如 23,24,25
            $table->integer('stime');   //开始时间
            $table->integer('ltime');   //会议时长
            $table->decimal('price', 10, 2);
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();

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
            $table->string('phone');
        });

//        //商品分类表
//        Schema::create('goods_types', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('typeName');
//            $table->integer('pid');
//            $table->string('path')->default('0');
//            // 0：禁用 1：启用
//            $table->tinyInteger('status')->default('1');
//            $table->string('attrIds')->nullable();
//        });
//
//        //商品属性表
//        Schema::create('goods_attrs', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('attrName');
//            $table->string('valueIds')->nullable();
//        });
//
//        //商品属性值表
//        Schema::create('goods_values', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('value');
//        });
//
//        //商品表
//        Schema::create('goods', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('sid');
//            $table->string('title');
//            $table->string('phone');
//            $table->string('license');
//            $table->integer('typeId');
//            $table->tinyInteger('status')->default('1');
//        });
//
//        //商品属性信息表
//        Schema::create('goods_attrinfo', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('gid');
//            $table->integer('goodAttrId');
//            $table->integer('goodAttrValId');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // Schema::dropIfExists('admins');

        // Schema::dropIfExists('users');

        // Schema::dropIfExists('shopkeepers');
    }
}
