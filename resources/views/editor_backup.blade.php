@extends('layouts.app')

@section('content')

<h1 class="text-center mb-4">
    Editor JepretYuk
</h1>

<div class="text-center">

    <canvas id="editorCanvas"
            width="900"
            height="1200"
            style="max-width:100%; border:2px solid #F2B632;">
    </canvas>

    <br><br>

    <button id="downloadBtn"
            class="btn btn-jepret">
        Download Hasil
    </button>

    <button id="saveBtn"
            class="btn btn-success ms-2">
        Simpan Hasil
    </button>

    <button id="deleteEmoji"
            class="btn btn-danger ms-2">
        Hapus Sticker
    </button>

</div>

<hr class="my-4">

<h4 class="text-center">
    Emoji Sticker
</h4>

<div class="row justify-content-center mt-4">

    @for($i = 1; $i <= 20; $i++)

    <div class="col-auto mb-2">

        <img
            src="{{ asset('assets/emojis/emo_'.$i.'.png') }}"
            class="emojiBtn"
            data-emoji="{{ asset('assets/emojis/emo_'.$i.'.png') }}"
            width="60"
            style="
                cursor:pointer;
                border-radius:10px;
                border:2px solid #F2B632;
                padding:5px;
                background:white;
            "
        >

    </div>

    @endfor

</div>

@endsection

@section('scripts')

<script>

const photos =
JSON.parse(
    sessionStorage.getItem('photoArray')
);

const frameId =
{{ session('frame_id',1) }};

const canvas =
document.getElementById('editorCanvas');

const canvas =
new fabric.Canvas('editorCanvas');

let frameImage = new Image();

frameImage.onload = function(){

    drawFrame();

};

frameImage.src =
'/assets/frames/frame' + frameId + '.png';

function drawFrame(){

    ctx.clearRect(
        0,
        0,
        canvas.width,
        canvas.height
    );

    ctx.drawImage(
        frameImage,
        0,
        0,
        canvas.width,
        canvas.height
    );

    placePhotos();

}

function placePhotos(){

    if(frameId == 1){

        drawFrame1();

    }

    if(frameId == 2){

        drawFrame2();

    }

    if(frameId == 3){

        drawFrame3();

    }

}

function loadPhoto(index,x,y,w,h){

    if(!photos || !photos[index]) return;

    let img = new Image();

    img.onload = function(){

        ctx.drawImage(
            img,
            x,
            y,
            w,
            h
        );

    }

    img.src = photos[index];

}

function drawFrame1(){

    loadPhoto(0,120,180,650,170);

    loadPhoto(1,120,390,650,170);

    loadPhoto(2,120,600,650,170);

    loadPhoto(3,120,810,650,170);

}

function drawFrame2(){

    loadPhoto(0,60,150,350,200);

    loadPhoto(1,480,150,350,200);

    loadPhoto(2,60,390,350,200);

    loadPhoto(3,480,390,350,200);

    loadPhoto(4,60,640,350,200);

    loadPhoto(5,480,640,350,200);

}

function drawFrame3(){

    loadPhoto(0,130,240,620,240);

    loadPhoto(1,130,540,620,240);

}

document
.querySelectorAll('.emojiBtn')
.forEach(button => {

    button.addEventListener('click', () => {

        alert(
            'Emoji berhasil dipilih. Tahap berikutnya kita akan membuat emoji dapat ditempel, digeser, dan diperbesar menggunakan Fabric.js.'
        );

    });

});

document
.getElementById('deleteEmoji')
.addEventListener('click', () => {

    alert(
        'Fitur hapus sticker akan aktif setelah editor dipindahkan ke Fabric.js.'
    );

});

document
.getElementById('downloadBtn')
.addEventListener('click', () => {

    const link =
    document.createElement('a');

    link.download =
    'jepretyuk.png';

    link.href =
    canvas.toDataURL('image/png');

    link.click();

});

document
.getElementById('saveBtn')
.addEventListener('click', () => {

    fetch('/save-photo', {

        method:'POST',

        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':
            '{{ csrf_token() }}'
        },

        body:JSON.stringify({

            image:
            canvas.toDataURL('image/png')

        })

    })
    .then(res => res.json())
    .then(data => {

        alert(
            'Hasil berhasil disimpan'
        );

    });

});

</script>

@endsection