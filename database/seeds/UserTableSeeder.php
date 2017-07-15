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
        $num = [];
        $data=[];
        for($i=0;$i<20;$i++)
        {
            // // // 管理员
            //  $data[]=[
            //      'name' => str_random(10),
            //      'password' => encrypt('123'),
            //      'pic' => 'default.jpg',
            //      'remember_token' => str_random(50),
            //      'auth' => 1,
            //      'status' => 1,
            //      'created_at' => time(),
            //      'updated_at' => time()
            //  ];

            // 加盟商
//            $data[]=[
//                'name' => str_random(10),
//                'password' => encrypt('123'),
//                'email' => str_random(6).'@qq.com',
//                'phone' => mt_rand(13330000, 18899999),
//                'pic' => 'default.jpg',
//                'remember_token' => str_random(50),
//                'created_at' => time(),
//                'updated_at' => time()
//            ];


            do{
                $n = mt_rand(1,10000);
            }while(in_array($n,$num));
            $num[$i] = $n;

            // 订单
            $data[] = [
                'number' => mt_rand(13330000, 18899999),
                'uid'=>$n,
                'sids' => mt_rand(1, 100),
                'gids' => mt_rand(1, 100),
                'status' => mt_rand(1, 5),
                'price'=>mt_rand(100,1000),
               'created_at' => time(),
               'ended_at' => time()
            ];
        }

        \DB::table('orders')->insert($data);

    }
}
