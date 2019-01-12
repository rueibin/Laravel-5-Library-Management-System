<?php

use Illuminate\Database\Seeder;

use App\Models\Publishing;

class ReaderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();
        $data=[];

        for ($i=0;$i<21;$i++) {
            $data[]=[
                'name'=>$faker->userName,
                'gender'=>rand(1, 2),
                'barcode'=>rand(1000, 9999),
                'tel'=>'04'.(rand(12345678, 99999999)),
                'mobile'=>'09'.(rand(10000000, 99999999)),
                'email'=>$faker->email,
                'borrow_book'=>rand(1, 6),
                'created_at'=>date('Y-m-d H:i:s', time()),
                'status'=>1
            ];
        }
        DB::table('readers')->insert($data);
    }

    public function down()
    {
        Schema::dropIfExists('readers');
    }
}
