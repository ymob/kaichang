<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //填充数据
        $data=[];
        for($i=0;$i<10;$i++)
        {
            // // 管理员
            //  $data[]=[
            //     'name' => str_random(10),
            //     'password' => encrypt('123'),
            //     'pic' => 'default.jpg',
            //     'remember_token' => str_random(50),
            //     'created_at' => time(),
            //     'updated_at' => time(),
            //     'status'=>'1',
            //     'auth'=>'1'

            // ];

            // 加盟商
            // $data[]=[
            //     'name' => str_random(10),
            //     'password' => encrypt('123'),
            //     'email' => str_random(6).'@qq.com',
            //     'phone' => mt_rand(13330000, 18899999),
            //     'pic' => 'default.jpg',
            //     'remember_token' => str_random(50),
            //     'created_at' => time(),
            //     'updated_at' => time()

            // ];

            //评论表
            // $data[] = [
            //     'gid'=>mt_rand(1,100),
            //     'uid'=>mt_rand(1,100),
            //     'content'=>str_random(20),
            //     'created_at' => time(),
            //     'updated_at' => time(),
            //     'status'=>'1'
            // ];

            //广告表
            // $data[] = [
            //     'title'=>str_random(
            //         20),
            //     'content'=>str_random(50),
            //     'pic'=>str_random(20),
            //     'url'=>str_random(20)
            // ];

            //订单表
            $data[] = [
                'number'=>mt_rand(10000000,99999999),
                'sid'=>mt_rand(1,300),
                'gid'=>mt_rand(1,300),
                'status'=>mt_rand(0,2),
                'created_at'=>time(),
                'ended_at'=>time()

            ];
        }

        \DB::table('orders')->insert($data);

    }
}
