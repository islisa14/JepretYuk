@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-lg-8">

        <h3 class="mb-3 text-center">
            Hasil JepretYuk
        </h3>

        <div class="text-center">

            <canvas id="editorCanvas"
                    width="650"
                    height="850"
                    style="
                        border:2px solid #F2B632;
                        max-width:100%;
                    ">
            </canvas>

        </div>

        <div class="text-center mt-3">

            <button id="downloadBtn"
                    class="btn btn-jepret">
                Download Hasil
            </button>

            <button id="deleteEmoji"
                    class="btn btn-danger ms-2">
                Hapus Sticker
            </button>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card card-jepret p-3">

            <h4 class="text-center mb-3">
                Emoji Sticker
            </h4>

            <div class="row">

                @for($i = 1; $i <= 20; $i++)

                <div class="col-3 mb-3 text-center">

                    <img
                        src="{{ asset('assets/emojis/emo_'.$i.'.png') }}"
                        class="emojiBtn"
                        data-emoji="{{ asset('assets/emojis/emo_'.$i.'.png') }}"
                        width="55"
                        style="
                            cursor:pointer;
                            background:white;
                            border-radius:10px;
                            padding:5px;
                        "
                    >

                </div>

                @endfor

            </div>

        </div>

    </div>

</div>

@endsection

@section('scripts')

<script>

const canvas = new fabric.Canvas('editorCanvas');

const frameId = {{ session('frame_id',1) }};
const photos =
JSON.parse(
    sessionStorage.getItem('photoArray')
) || [];

/*
|--------------------------------------------------------------------------
| Load Frame
|--------------------------------------------------------------------------
*/

fabric.Image.fromURL(
    '/assets/frames/frame' + frameId + '.png',
    function(img){

        canvas.setBackgroundImage(
            img,
            canvas.renderAll.bind(canvas),
            {
                scaleX: canvas.width / img.width,
                scaleY: canvas.height / img.height
            }
        );

    }
);

function addPhoto(src, x, y, w) {

    fabric.Image.fromURL(src, function(img) {

        img.set({
            left: x,
            top: y,
            selectable: false,
            evented: false
        });
        img.scaleToWidth(w);

        canvas.add(img);

    });

}


setTimeout(() => {

    if(frameId == 1){

        if(photos[0]) addPhoto(photos[0],127,80,245);
        if(photos[1]) addPhoto(photos[1],127,257,245);
        if(photos[2]) addPhoto(photos[2],127,435,245);
        if(photos[3]) addPhoto(photos[3],127,612,245);

    }

    if(frameId == 2){

        if(photos[0]) addPhoto(photos[0],114,195,185);
        if(photos[1]) addPhoto(photos[1],352,195,185);

        if(photos[2]) addPhoto(photos[2],115,376,185);
        if(photos[3]) addPhoto(photos[3],352,376,185);

        if(photos[4]) addPhoto(photos[4],114,559,185);
        if(photos[5]) addPhoto(photos[5],352,559,185);

    }

    if(frameId == 3){

        if(photos[0]) addPhoto(photos[0],74,126,502);

    }

},1000);

/*
|--------------------------------------------------------------------------
| Emoji
|--------------------------------------------------------------------------
*/

document
.querySelectorAll('.emojiBtn')
.forEach(button => {

    button.addEventListener('click', () => {

        fabric.Image.fromURL(

            button.dataset.emoji,

            function(img){

                img.set({

                    left:300,
                    top:300,
                    scaleX:0.4,
                    scaleY:0.4

                });

                canvas.add(img);

                canvas.setActiveObject(img);

            }

        );

    });

});

/*
|--------------------------------------------------------------------------
| Delete Sticker
|--------------------------------------------------------------------------
*/

document
.getElementById('deleteEmoji')
.addEventListener('click', () => {

    const active =
    canvas.getActiveObject();

    if(active){

        canvas.remove(active);

    }

});

/*
|--------------------------------------------------------------------------
| Download
|--------------------------------------------------------------------------
*/

document
.getElementById('downloadBtn')
.addEventListener('click', () => {

    canvas.discardActiveObject();

    canvas.renderAll();

    const link =
    document.createElement('a');

    link.download =
    'JepretYuk_Hasil.png';

    link.href =
    canvas.toDataURL({

        format:'png',
        quality:1

    });

    link.click();

});

</script>

@endsection