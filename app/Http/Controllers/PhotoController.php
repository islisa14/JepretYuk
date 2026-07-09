<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function save(Request $request)
    {
        $image = $request->image;

        $image = str_replace(
            'data:image/png;base64,',
            '',
            $image
        );

        $image = str_replace(' ', '+', $image);

        $fileName =
            'hasil_' .
            time() .
            '_' .
            Str::random(5) .
            '.png';

        File::put(
            public_path('uploads/' . $fileName),
            base64_decode($image)
        );

        Photo::create([
            'nama_file' => $fileName,
            'paket' => session('paket'),
            'frame_id' => session('frame_id')
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}