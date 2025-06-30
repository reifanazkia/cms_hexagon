<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SocialAccountSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sosmed')->truncate(); // Hapus data lama

        $now = Carbon::now();

        DB::table('sosmed')->insert([
            [
                'logo' => 'default.png',
                'nama' => 'instagram',
                'link' => 'https://www.instagram.com/hexagoninc',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'logo' => 'default.png',
                'nama' => 'youtube',
                'link' => 'https://www.youtube.com/@Hexagon-Inc',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'logo' => 'default.png',
                'nama' => 'facebook',
                'link' => 'https://web.facebook.com/infolokerbdg.id/posts/hexagon',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'logo' => 'default.png',
                'nama' => 'linkedin',
                'link' => 'https://linkedin.com/company/hexagon',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
