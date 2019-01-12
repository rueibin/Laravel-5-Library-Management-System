<?php

use Illuminate\Database\Seeder;

use App\Models\Book;


class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookcases=[
            [
                'barcode'=>'9789864762606',
                'name'=>'PHP 學習手冊',
                'author'=>'David Sklar',
                'translator'=>'張靜雯',
                'book_type_id'=>1,
                'publishing_id'=>6,
                'price'=>580,
                'page'=>416,
                'book_case_id'=>1,
                'storage'=>rand(1, 6),
                'publication_day'=>'2016-12-20',
                'image'=>'1547312005.jpg',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'barcode'=>'9789864340293',
                'name'=>'Java SE 8懶人包',
                'author'=>'Cay S. Horstmann',
                'translator'=>'江良志',
                'book_type_id'=>1,
                'publishing_id'=>4,
                'price'=>360,
                'page'=>256,
                'book_case_id'=>2,
                'storage'=>rand(1, 6),
                'publication_day'=>'2015-07-31',
                'image'=>'1547312147.jpg',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'barcode'=>'9789865002848',
                'name'=>'NET Core開發實作',
                'author'=>'張劍橋',
                'translator'=>'',
                'book_type_id'=>1,
                'publishing_id'=>1,
                'price'=>590,
                'page'=>363,
                'book_case_id'=>5,
                'storage'=>rand(1, 6),
                'publication_day'=>'2018-11-07',
                'image'=>'1547312363.jpg',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],

        ];

        foreach ($bookcases as $key => $value) {
            Book::create($value);
        }
    }
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
