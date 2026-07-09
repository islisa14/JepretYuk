<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JepretYuk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#1A1612;
            color:#F5F1EA;
        }
        .navbar{
            background:#221B16;
        }

        .card-jepret{
            background:#2A211B;
            border:1px solid #F2B632;
            border-radius:15px;
        }
        
        .btn-jepret{
            background:#F2B632;
            color:#111;
            font-weight:bold;
        }

        .btn-jepret:hover{
            background:#d89f27;
        }

        .paket-title{
            color:#F2B632;
            font-weight:700;
        }

        .paket-frame{
            color:#F5F1EA;
        }

        .paket-price{
            color:#F2B632;
            font-weight:800;
            margin-top:10px;
        }

        .card-jepret{
            background:#2A211B;
            border:1px solid #F2B632;
            border-radius:20px;
            transition:0.3s;
        }

        .card-jepret:hover{
            transform:translateY(-5px);
            box-shadow:0 10px 20px rgba(242,182,50,0.15);
        }

        .card-jepret{
            background:#2A211B;
            border:1px solid #F2B632;
            border-radius:20px;
            transition:0.35s;
        }

        .card-jepret:hover{
            transform:translateY(-8px);
            box-shadow:
                0 0 20px rgba(242,182,50,.25),
                0 0 40px rgba(242,182,50,.10);
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('assets/images/logo.png') }}"
            alt="JepretYuk"
            width="50">

            <span class="ms-2 fw-bold">
                JepretYuk
            </span>
        </a>

        <div>
            <a href="/" class="text-white me-3">Home</a>
            <a href="/paket" class="text-white">Paket</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    @yield('content')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
@yield('scripts')

</body>
</html>