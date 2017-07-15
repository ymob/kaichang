<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //商品(场地)表 places
        Schema::create('places',function(Blueprint $table){
            $table->increments('id');
            $table->integer('sid'); //商户id
            //场地类型 1酒店、2会议中心、3体育馆、4展览馆、5酒吧/餐厅/会所、6艺术中心/剧院、7咖啡厅/茶室
            $table->integer('typeId');
            //酒店星级 2 三星以下 3三星级 4星级 5星级 6星级 7星级
            $table->integer('hotelStar')->nullable();
            $table->string('title');
            //地址 两个下拉加一个输入  格式:省编号,市编号,详细地址
            $table->string('address');
            $table->string('phone');
            $table->string('evidencePic'); //场地出租凭证图片
            $table->string('park')->nullable(); //停车位 1 有 0无
            $table->string('maxArea')->nullable();  //单位 平米
            $table->string('maxPeople')->nullable(); //单位 人
            //免费服务 1暖气  2地毯  3音响  4无线话筒  5固定投影  6固定幕布  7移动投影  8电视屏  9白板  10移动舞台  11茶/水  12纸笔  13桌卡  14指引牌  15签到台 16鲜花 17茶歇  18有线话筒 19台式话筒 20小蜜蜂 21移动幕布 22LED屏 23移动讲台 24宽带接口  25代客泊车  26停车场
            $table->string('freeService')->nullable();  //格式: 1,3,6
            //配套服务 1茶歇 2客房 3AV设备
            $table->string('supportService')->nullable();  //格式: 1,2,3
            $table->string('description')->nullable();
            //总价 元/天 由其下会场及配套设备的价格最后相加而得
            $table->decimal('price', 10, 2);
            $table->string('pic')->default('default_place.jpg');  //1.jpg,2.jpg,3.jpg
            $table->integer('status')->default('1'); //默认1上架  0下架
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        //场地下的 会场表 meetplaces
        Schema::create('meetplaces',function(Blueprint $table){
            $table->increments('id');
            $table->integer('pid'); //场地id
            $table->string('title');
            $table->string('area');  //单位 平米
            $table->string('deskPeople'); //单位 人
            $table->string('dinnerPeople'); //单位 人
            //从场地中已选择的 当中选
            $table->string('freeService')->nullable();  //格式: 1,3,6
            //从场地中已选择的 当中选
            $table->string('supportService')->nullable();  //格式: 1,2,3
            $table->decimal('price', 10, 2);
            $table->string('pic')->default('default_meet.jpg');  //1.jpg,2.jpg,3.jpg
            $table->integer('status')->default('1'); //默认1上架  0下架
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        //会场下的 配套服务 facilities
        Schema::create('facilities',function(Blueprint $table){
            $table->increments('id');
            $table->integer('mid'); //会场id
            $table->integer('supportType'); //类型 1客房 2茶歇 3AV设备
            //对应类型下的分类 客房(1单人间、2标准间（双床）、3双人间、4套间客房、5公寓式客房、6总统套房、7特色客房)
            //               茶歇(1中式、2西式)
            //               AV设备(1音响设备、2麦克风、3投影仪)
            $table->integer('type');
            $table->decimal('price', 10, 2);
            $table->string('pic')->default('default_fac.jpg');  //1.jpg,2.jpg,3.jpg
            $table->integer('status')->default('1'); //默认1上架  0下架
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
        //
    }
}
