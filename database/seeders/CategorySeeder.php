<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'name' => 'Tops',
        	'picture' => 'gambar1.jpg',
        ]);

        DB::table('categories')->insert([
        	'name' => 'Bottoms',
        	'picture' => 'gambar2.jpg',
        ]);

        DB::table('categories')->insert([
        	'name' => 'Headwear',
        	'picture' => 'gambar3.jpg',
        ]);

        DB::table('categories')->insert([
        	'name' => 'Addiitional',
        	'picture' => 'gambar4.jpg',
        ]);
    }
}
