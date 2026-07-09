<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('bukti');

        $filename =
            time().'_'.$file->getClientOriginalName();

        $file->move(
            public_path('payments'),
            $filename
        );

        
        Payment::create([
        'paket' => $request->paket,
        'bukti' => $filename
    ]);

        session([
        'payment_done' => true,
        'paket' => $request->paket
    ]);

        return redirect('/frame');
    }
}