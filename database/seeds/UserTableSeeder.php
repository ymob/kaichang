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
                'auth'=>1,
                'pic'=>'149866865622689887.jpeg',
                'remember_token'=>str_random(50),
                'created_at'=>time(),
                'updated_at'=>time()
            ];
        }
        \DB::table('admins')->insert($data);

    }
}
