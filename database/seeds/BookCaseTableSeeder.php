<?php

use Illuminate\Database\Seeder;

use App\Models\BookCase;

class BookCaseTableSeeder extends Seeder
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
                'name'=>'PHP',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'Jave',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'MySql',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'Linux',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'ASP.NET',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'Node.js',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'SQL Server',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'CentOS',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'C#',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'Vue',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
            [
                'name'=>'JavaScript',
                'created_at'=>date('Y-m-d H:i:s', time())
            ],
        ];

        foreach ($bookcases as $key => $value) {
            BookCase::create($value);
        }
    }
    public function down()
    {
        Schema::dropIfExists('book_cases');
    }
}
