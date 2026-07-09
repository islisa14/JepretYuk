@extends('layouts.app')

@section('content')

<div class="text-center">

    <h1 class="mb-4">
        JepretYuk Camera
    </h1>

    @php
        $jumlahFoto = session('jumlah_foto',1);
    @endphp

    <h3 id="photoCounter">
        Foto 1 dari {{ $jumlahFoto }}
    </h3>

    <div class="position-relative">

        <video id="video"
               width="700"
               height="500"
               autoplay
               class="rounded border border-warning">
        </video>

        <div id="countdown"
             class="position-absolute top-50 start-50 translate-middle fw-bold"
             style="font-size:100px;color:#F2B632;">
        </div>

    </div>

    <canvas id="canvas"
            width="700"
            height="500"
            style="display:none;">
    </canvas>

    <div class="mt-4">

        <button id="captureBtn"
                class="btn btn-jepret btn-lg">
            📸 Ambil Foto
        </button>

    </div>

</div>

@endsection

@section('scripts')

<script>

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');

const countdown = document.getElementById('countdown');
const counter = document.getElementById('photoCounter');

let totalPhoto = {{ $jumlahFoto }};
let currentPhoto = 1;

let photos = [];

navigator.mediaDevices.getUserMedia({
    video:true
})
.then(stream => {
    video.srcObject = stream;
});

document
.getElementById('captureBtn')
.addEventListener('click', startCountdown);

function startCountdown(){

    let count = 3;

    countdown.innerHTML = count;

    let timer = setInterval(() => {

        count--;

        if(count > 0){

            countdown.innerHTML = count;

        }else{

            countdown.innerHTML = "📸";

            clearInterval(timer);

            setTimeout(capturePhoto,1000);

        }

    },1000);

}

function capturePhoto(){

    const ctx = canvas.getContext('2d');

    ctx.drawImage(
        video,
        0,
        0,
        canvas.width,
        canvas.height
    );

    let image = canvas.toDataURL('image/png');

    photos.push(image);

    if(currentPhoto < totalPhoto){

        currentPhoto++;

        counter.innerHTML =
            "Foto " +
            currentPhoto +
            " dari " +
            totalPhoto;

        countdown.innerHTML = "";

        startCountdown();

    }else{

        sessionStorage.setItem(
            'photoArray',
            JSON.stringify(photos)
        );

        window.location.href="/editor";
    }

}

</script>

@endsection