<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACAK SERTIFIKAT | Login</title>
    <!--  LINK TO CSS    -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/png">
</head>
<body class="body-cek-login" id="body-cek-login">
    <div class="container-ceklogin" id="container-mobile">
        <div class="wrapper-form-outdoor" id="wrapper-mobile">
            <h2 class="content-one" id="content-mobile">LOGIN USER / <i> USER LOGIN</i></h2>
            <img src="assets/img/Login-cuate.png" alt="" class="content-icon-img" id="img-mobile">
            <a href="{{url('/sesi')}}" class="button-submit-form-admin">Login admin</a>
            <div class="wrapper-form-indoor-user" id="wrapper-mobile-two-user">

                <form action="/login/login" method="POST" class="form-input-login">
                    @csrf
                    <label for="email" class="label-form-username">Username</label>
                    <input type="email" value="{{Session::get('email')}}" name="email" placeholder="Masukkan Username Anda..." class="input-form-username" >
                    <br>
                    <label for="password" class="label-form-pass">Password</label>
                    <input type="password" name="password" placeholder="Masukkan Password Anda..." class="input-form-pass" >
                    <br>
                    <button name="sumbit" type="submit" class="button-submit-form">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
