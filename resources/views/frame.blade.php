@extends('layouts.app')

@section('content')

@php
$paket = strtolower(session('paket', ''));
@endphp

<div class="text-center mb-5">

```
<h1 style="
    color:#F2B632;
    font-weight:800;
    letter-spacing:1px;
">
    Pilih Frame Favoritmu
</h1>

<p style="
    color:#D7C5B4;
    font-size:18px;
">
    Paket Aktif :
    <span style="
        color:#F5F1EA;
        font-weight:700;
    ">
        {{ ucfirst($paket) }}
    </span>
</p>
```

</div>

<div class="row justify-content-center">

```
{{-- FRAME 1 --}}
<div class="col-lg-4 col-md-6 mb-4">

    <div class="card card-jepret p-3 h-100 text-center">

        <img src="{{ asset('assets/frames/frame1.png') }}"
             class="img-fluid rounded">

        <div class="mt-3">

            <span class="badge"
                  style="
                    background:#F2B632;
                    color:#111;
                    font-size:14px;
                  ">
                3 FOTO
            </span>

        </div>

        <h3 class="mt-3"
            style="
                color:#F5F1EA;
                font-weight:700;
            ">
            Frame 1
        </h3>

        <p style="color:#D7C5B4;">
            Cocok untuk gaya photostrip klasik
        </p>

        <a href="/pilih-frame/1"
           class="btn btn-jepret btn-lg">
            Gunakan Frame
        </a>

    </div>

</div>

{{-- FRAME 2 --}}
@if($paket == 'kaya')

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card card-jepret p-3 h-100 text-center">

        <img src="{{ asset('assets/frames/frame2.png') }}"
             class="img-fluid rounded">

        <div class="mt-3">

            <span class="badge"
                  style="
                    background:#F2B632;
                    color:#111;
                    font-size:14px;
                  ">
                6 FOTO
            </span>

        </div>

        <h3 class="mt-3"
            style="
                color:#F5F1EA;
                font-weight:700;
            ">
            Frame 2
        </h3>

        <p style="color:#D7C5B4;">
            Lebih banyak momen dalam satu frame
        </p>

        <a href="/pilih-frame/2"
           class="btn btn-jepret btn-lg">
            Gunakan Frame
        </a>

    </div>

</div>

@endif

{{-- FRAME 3 --}}
@if($paket == 'cukup' || $paket == 'kaya')

<div class="col-lg-4 col-md-6 mb-4">

    <div class="card card-jepret p-3 h-100 text-center">

        <img src="{{ asset('assets/frames/frame3.png') }}"
             class="img-fluid rounded">

        <div class="mt-3">

            <span class="badge"
                  style="
                    background:#F2B632;
                    color:#111;
                    font-size:14px;
                  ">
                2 FOTO
            </span>

        </div>

        <h3 class="mt-3"
            style="
                color:#F5F1EA;
                font-weight:700;
            ">
            Frame 3
        </h3>

        <p style="color:#D7C5B4;">
            Tampilan minimalis dan elegan
        </p>

        <a href="/pilih-frame/3"
           class="btn btn-jepret btn-lg">
            Gunakan Frame
        </a>

    </div>

</div>

@endif
```

</div>

@endsection
