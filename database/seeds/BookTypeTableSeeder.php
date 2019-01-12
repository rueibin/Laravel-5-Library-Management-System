<?php

use Illuminate\Database\Seeder;

use App\Models\BookType;

class BookTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booktypes=[
            [
                'name'=>'程式設計',
                'borrow_day'=>7,
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'作業系統',
                'borrow_day'=>6,
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'資料庫設計',
                'borrow_day'=>8,
                'created_at'=>date('Y-m-d H:i:s', time())
            ]
        ];

        foreach ($booktypes as $key => $value) {
            BookType::create($value);
        }
    }
    public function down()
    {
        Schema::dropIfExists('book_types');
    }
}
