<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencies')->insert([
            'name' => 'PADI',
        ]);
        DB::table('agencies')->insert([
            'name' => 'SSI',
        ]);
        DB::table('agencies')->insert([
            'name' => 'TDI',
        ]);
        DB::table('agencies')->insert([
            'name' => 'GUE',
        ]);
        DB::table('agencies')->insert([
            'name' => 'NAUI',
        ]);
        DB::table('agencies')->insert([
            'name' => 'RAID',
        ]);
        DB::table('agencies')->insert([
            'name' => 'SDI',
        ]);
    }
}
