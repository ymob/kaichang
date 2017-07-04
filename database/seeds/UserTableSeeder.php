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
        for($i=0;$i<48;$i++)
        {
            // // 管理员
            // $data[]=[
            //     'name' => str_random(10),
            //     'password' => encrypt('123'),
            //     'pic' => 'default.jpg',
            //     'remember_token' => str_random(50),
            //     'created_at' => time(),
            //     'updated_at' => time()
            // ];

            // 加盟商
            $data[]=[
                'name' => str_random(10),
                'password' => encrypt('123'),
                'email' => str_random(6).'@qq.com',
                'phone' => mt_rand(13330000, 18899999),
                'pic' => 'default.jpg',
                'remember_token' => str_random(50),
                'created_at' => time(),
                'updated_at' => time()
            ];
        }

        \DB::table('users')->insert($data);

    }
}
