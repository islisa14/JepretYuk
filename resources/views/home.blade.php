@extends('layouts.app')

@section('content')

<div class="text-center">

    <img src="{{ asset('assets/images/logo.png') }}"
         width="250"
         class="mb-4">

    <h1 class="display-4 fw-bold">
        JepretYuk
    </h1>

    <p class="lead">
        Abadikan momen terbaikmu dengan photobooth online
        yang kreatif, cepat, dan menyenangkan.
    </p>

    <a href="/paket" class="btn btn-jepret btn-lg">
        Mulai Jepret
    </a>

</div>

@endsection