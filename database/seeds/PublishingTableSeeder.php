<?php

use Illuminate\Database\Seeder;

use App\Models\Publishing;

class PublishingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishings=[
            [
                'name'=>'旗標',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'上奇資訊',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'歐萊禮',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'博碩',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'佳魁資訊',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'碁峰',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'經瑋',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'松崗',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'易習圖書',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'新文京',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'深石',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'全華圖書',
                'created_at'=>date('Y-m-d H:i:s', time())
            ]
        ];

        foreach ($publishings as $key => $value) {
            Publishing::create($value);
        }
    }

    public function down()
    {
        Schema::dropIfExists('publishings');
    }
}
