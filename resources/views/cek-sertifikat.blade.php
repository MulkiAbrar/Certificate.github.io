<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACAK SERTIFIKAT | Form Cek Sertifikat</title>
    <!--  LINK TO CSS    -->
    <link rel="stylesheet" href="{{('assets/css/style.css')}}">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/png">
</head>
<body class="body-cek-sertifikat" id="body-cek-sertifikat">
    <div class="container-ceksertifikat" id="container-mobile">
        <a href="{{url('dashboard-user')}}" class="back" id="back-mobile">< Kembali</a>
        <div class="wrapper-form-outdoor" id="wrapper-mobile">
            <h2 class="content-one" id="content-mobile">Validasi Kode Sertifikat / <i>Certificate Code Validation</i></h2>
            <img src="{{asset('assets/img/Login-cuate.png')}}" alt="" class="content-icon-img" id="img-mobile">
            <div class="wrapper-form-indoor" id="wrapper-mobile-two">
                <form action="{{url('/table')}}" method="get" class="form-input-sertifikat">
                    <label for="nisn" class="label-form-nis" id="label-form-nis">NISN/NIS</label>

                    <input type="text" name="katakunci" placeholder="Masukkan NISN/NIS Anda..." class="input-form-nis" id="input-form-nis" value="{{Request::get('katakunci') }}" placeholder="Masukkan Kata Pencarian" aria-label="Search">
                    <br>
                    <label for="nomor" class="label-form-sertifikat" id="label-form-sertifikat">Kode Sertifikat</label>
                    <input type="text" name="katakunci" placeholder="Masukkan Kode Sertifikat Anda..." class="input-form-kode" id="input-form-kode"  value="{{Request::get('katakunci2') }}" placeholder="Masukkan Kata Pencarian" aria-label="Search">
                    <br>
                    <button name="submit" type="submit"
                    class="button-submit-form">search</button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
