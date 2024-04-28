<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('book_categories')->insert([
            ['name' => 'Fiction'],
            ['name' => 'Non-fiction'],
            ['name' => 'Science Fiction'],
            ['name' => 'Biography'],
            ['name' => 'Thriller'],
        ]);
    }

}
