<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('home');
});

Route::get('/paket', function () {
    return view('paket');
});

Route::get('/kamera', function () {

    if(!session('payment_done'))
    {
        return redirect('/paket');
    }

    return view('kamera');

});

Route::get('/editor', function () {
    return view('editor');
});

Route::get('/hasil', function () {
    return view('hasil');
});

Route::get('/frame', function () {

    return view('frame');
});

Route::get('/pilih-frame/{id}', function ($id) {

    $jumlahFoto = 0;

    if($id == 1){
        $jumlahFoto = 4;
    }

    if($id == 2){
        $jumlahFoto = 6;
    }

    if($id == 3){
        $jumlahFoto = 1;
    }

    session([
        'frame_id' => $id,
        'jumlah_foto' => $jumlahFoto
    ]);

    return redirect('/kamera');
});

Route::post('/save-photo', [PhotoController::class, 'save']);
Route::post(
    '/payment/upload',
    [PaymentController::class,'upload']
);

Route::get('/bayar/{paket}', function ($paket) {

    session([
        'paket' => $paket
    ]);

    return view('bayar', compact('paket'));
});

Route::post(
    '/payment/upload',
    [PaymentController::class,'upload']
);