@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="text-center mb-4">
        Pembayaran Paket {{ ucfirst($paket) }}
    </h1>

    <div class="card card-jepret p-4">

        <h4>Scan QRIS Berikut</h4>

        <div class="text-center mb-4">

            <img src="{{ asset('img/qris.png') }}"
                 width="250">

        </div>

        <form action="/payment/upload"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <input type="hidden"
                   name="paket"
                   value="{{ $paket }}">

            <div class="mb-3">

                <label class="form-label">
                    Upload Bukti Pembayaran
                </label>

                <input type="file"
                       name="bukti"
                       class="form-control"
                       required>

            </div>

            <button class="btn btn-jepret w-100">
                Kirim Bukti Pembayaran
            </button>

        </form>

    </div>

</div>

@endsection