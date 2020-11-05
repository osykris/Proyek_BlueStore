<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OngkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ongkirs')->insert([
        	'namaKota' => 'Blitar',
        	'tarif' => '8000',
        ]);

        DB::table('ongkirs')->insert([
        	'namaKota' => 'Malang',
        	'tarif' => '12000',
        ]);

        DB::table('ongkirs')->insert([
        	'namaKota' => 'Kediri',
        	'tarif' => '15000',
        ]);

        DB::table('ongkirs')->insert([
        	'namaKota' => 'Surabaya',
        	'tarif' => '13000',
        ]);

        DB::table('ongkirs')->insert([
        	'namaKota' => 'Jakarta',
        	'tarif' => '35000',
        ]);

        DB::table('ongkirs')->insert([
        	'namaKota' => 'Bandung',
        	'tarif' => '39000',
        ]);
    }
}
