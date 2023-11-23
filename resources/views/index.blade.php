@extends('layout1.template')
@section('konten')
<body class="body-login-admin">
        <div class="font-login">
            <a href="{{url('/login')}}" class="back" id="back-mobile">< Kembali</a>
            <h1 class="judul-login"> Anda Admin?</h1>
            <h4 class="desc-login">Silahkan Login Terlebih dahulu untuk mengakses Dashboard </h4>
            <img src="{{('assets/img/Version control-cuate.png')}}" alt="" class="icon-vector-login">
        </div>
    <div class="container-login">
        <form action="/sesi/login" method="POST" class="wrapping-login">
        @csrf

            <label for="email" class="label-username">Username</label>
            <input type="email" value="{{Session::get('email')}}" name="email" class="input-username" placeholder="Masukkan Username Anda...">
            <br>
            <label for="password" class="label-password">Password</label>
            <input type="password"  name="password" class="input-pasword" placeholder="Masukkan Password anda...">
            <br>
            <button name="submit" type="submit"
            class="button-login">Login</button>
        </form>
    </div>
</body>

@endsection
