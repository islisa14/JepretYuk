<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
</head>
<body>

    <h2>Pembayaran Paket {{ $paket }}</h2>

    <h3>Scan QRIS Berikut</h3>

    <img src="{{ asset('img/qris.png') }}"
         width="250">

    <br><br>

    <form action="/payment/upload"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <input type="hidden"
               name="paket"
               value="{{ $paket }}">

        <label>
            Upload Bukti Pembayaran
        </label>

        <br><br>

        <input type="file"
               name="bukti"
               required>

        <br><br>

        <button type="submit">
            Kirim Bukti Pembayaran
        </button>

    </form>

</body>
</html>