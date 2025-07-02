<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FixPortoImageController extends Controller
{
    public function generate()
    {
        $fotoNames = DB::table('foto_porto')->pluck('nama_foto');
        $created = 0;

        foreach ($fotoNames as $namaFoto) {
            $path = storage_path('app/public/' . $namaFoto);

            if (!File::exists($path)) {
                File::ensureDirectoryExists(dirname($path));

                // Buat dummy image 300x200 px
                $img = imagecreatetruecolor(300, 200);
                $bgColor = imagecolorallocate($img, 240, 240, 240);
                imagefilledrectangle($img, 0, 0, 300, 200, $bgColor);
                $textColor = imagecolorallocate($img, 100, 100, 100);
                imagestring($img, 5, 60, 90, 'Dummy Image', $textColor);
                imagepng($img, $path);
                imagedestroy($img);

                $created++;
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Dummy image berhasil dibuat.',
            'dummy_created' => $created,
        ]);
    }
}
