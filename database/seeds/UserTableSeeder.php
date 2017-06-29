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
        for($i=0;$i<50;$i++)
        {
            $data[]=[
                'name'=>str_random(10),
                'password'=>encrypt('123'),
                'auth'=>2,
                'pic'=>'149866865622689887.jpeg'
            ];
        }
        \DB::table('users')->insert($data);

    }
}
