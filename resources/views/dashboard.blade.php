<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACAK SERTIFIKAT | Home Page</title>
    <!-- LINK TO CSS -->
    <link rel="stylesheet" href="{{('assets/css/style.css')}}">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/png">
    <!-- SCRIPT TO FONTAWESOME -->
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

</head>
<body id="container-all-page">
    <nav class="content-navbar">
        <img src="{{asset('assets/img/468C6E25-493E-4834-AA12-FC597CB72115-removebg-preview.png')}}" alt="" class="container-logo" width="150" height="150">
        <ul class="content-unlist">
            <li>  <a href="{{url('/login')}}" onclick="return validateBack()">Kembali</a>

                <script>
                    function validateBack() {
                        var konfirmasi = confirm('Anda yakin ingin logout?');

                        if (konfirmasi) {
                            // Lakukan tindakan kembali, misalnya mengarahkan ke halaman login
                            // Contoh:
                             window.location.href = "{{url('/login')}}";

                            alert('Logout berhasil');
                            return true; // Mengizinkan tautan untuk diikuti
                        } else {
                            // Jika pengguna membatalkan, tidak melakukan apa-apa
                            alert('Logout dibatalkan');
                            return false; // Mencegah tautan untuk diikuti
                        }
                    }
                </script></li>
            <li><a href="#2">Tentang</a></li>
            <li><a href="#3">Cara Kerja</a></li>
            <li><a href="{{url('/cek')}}">Check</a></li>

        </ul>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
        <section class="onescroll-page">
            <div class="container-content-landingpage">
                <div class="content-landing-page" id="content-landing-page-mobile">
                    <h1 class="content-text-header" id="1"> Selamat Datang di Website Lacak Sertifikat</h1>
                    <p class="content-text-desc">Lacak Sertifikat Dengan Mudah dan cepat</p>
                    <a href="{{url('/cek')}}" class="button-to-form">Check Sekarang ></a>
                    <img src="{{asset('assets/img/Certification-cuate.png')}}" alt="" class="content-img" id="content-img">
                </div>
            </div>

            <div class="wrapper-all-content">
                <div class="container-about" id="2">
                    <img src="{{asset('assets/img/Creative team-cuate.png')}}" alt="" class="content-img-about">
                    <div class="wrapper-about">
                        <h1 class="about" id="tentang">Tentang Website Kami !</h1>
                        <p class="about-desc">Dengan Majunya Teknologi di Masa kini melacak Sertifikat bisa lebih dengan Mudah, Dengan adanya Inovasi baru Aplikasi Lacak Sertifikat, kami mempermudah anda untuk mentracking sertifikat anda Secara cepat Dan Mudah.</p>
                    </div>
                </div>

                <div class="wrapper-all-content-carakerja" id="3">
                    <img src="{{('assets/img/Woman thinking-cuate.png')}}" alt="" class="content-img-carakerja" id="content-img-carakerja">
                    <div class="wrapper-cara-kerja">
                        <div class="cara-kerja-header">
                            <i class="fas fa-question-circle" id="icon"></i>
                            <h1 class="cara-kerja" >Cara Kerja</h1>
                        </div>
                        <br>
                        <div class="paragraf-cara-kerja">
                        <p class="p1">1.  Untuk MengAkses Serifikat Anda, harap masuk ke dalam form pelacakan sertifikat <a href="{{ url('sertifikat') }}">klik di sini</a></p>
                        <p class="p2">2.  Setelah Masuk Ke Dalam form,Masukkan NISN/NIS dan juga Kode Sertifikat</p>
                        <p class="p3">3.  Harap NISN/NIS dan Kode Sertifikat anda Benar dan Terdaftar oleh Admin</p>
                        <p class="p4">4.  Setelah selesai Menginput, Klik Search dan otomatis sistem akan mengarahkan ke halaman sertifikat dan sertifikat siap di unduh</p>
                        <p class="p5">5.  selesai, Anda bisa mengunduh sertifikat dengan format PDF. </p>
                        </div>
                    </div>
                </div>

            </div>

        </section>

         <!-- LINK TO JS -->
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>
