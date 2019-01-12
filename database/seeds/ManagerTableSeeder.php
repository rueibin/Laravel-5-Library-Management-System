<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();
        $data=[
            'username'=>'admin',
            'password'=>bcrypt('123456'),
            'gender'=>'1',
            'mobile'=>'1234567890',
            'email'=>'admin123@yahoo.com.tw',
            'status'=>'1',
            'created_at'=>date('Y-m-d H:i:s', time())
        ];
        DB::table('manager')->insert($data);
    }
}
