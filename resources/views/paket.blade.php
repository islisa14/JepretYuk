@extends('layouts.app')

@section('content')

<h1 class="text-center mb-5">
    Pilih Paket
</h1>

<div class="row">

    <div class="col-md-4 mb-4">
        <div class="card card-jepret p-4 h-100">

            <h3 class="paket-title">Mahasiswa</h3>

            <h2 class="paket-price">Rp 5.000</h2>

            <p class="paket-frame">
                1 Frame
            </p>

            <a href="/bayar/mahasiswa" class="btn btn-jepret">
                Pilih
            </a>

        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-jepret p-4 h-100">

            <h3 class="paket-title">Cukup</h3>

            <h2 class="paket-price">Rp 10.000</h2>

            <p class="paket-frame">
                2 Frame
            </p>

            <a href="/bayar/cukup" class="btn btn-jepret">
                Pilih
            </a>

        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-jepret p-4 h-100">

            <h3 class="paket-title">Kaya</h3>

            <h2 class="paket-price">Rp 15.000</h2>

            <p class="paket-frame">
                3 Frame
            </p>

            <a href="/bayar/kaya" class="btn btn-jepret">
                Pilih
            </a>

        </div>
    </div>

</div>

@endsection