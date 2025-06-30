<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contact')->truncate(); // Kosongkan tabel dulu

        DB::table('contact')->insert([
            'notlp' => '(+62) 812 2218 1823',
            'email' => 'contact@hexagon.co.id',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
