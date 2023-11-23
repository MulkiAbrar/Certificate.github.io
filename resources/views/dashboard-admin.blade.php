<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LS | Dashboard Admin</title>
    <!-- LINK TO CSS -->
    <link rel="stylesheet" href="{{('assets/css/dashboard.css')}}">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/png">
</head>
<body class="dashboard-admin">
    <input type="checkbox" id="check">
    <label for="check">
        <img src="assets/img/icons8-hamburger-menu-64.png" alt="" id="btn" width="25" height="25">
        <img src="assets/img/icons8-x-64.png" alt="" id="cancel" width="20" height="20">
    </label>
        <div class="container-sidebar">
            <header class="font-sidebar">Hello! Admin!</header>
                <ul class="navbar-list">
                    <li>
                        <a href="{{url('dashboard') }}"><img src="assets/img/icons8-dashboard-32.png" alt="" width="15" height="15"> Beranda</a>
                    </li>
                    <li>
                        <a href="{{ url('sertifikat') }}"><img src="assets/img/icons8-certificate-48.png" width="20" height="20">Data Sertifikat</a>
                    </li>
                    <li>
                        <a href="{{ url('pengguna') }}"><img src="assets/img/icons8-user-24.png" width="20" height="20">Data User</a>
                    </li>
                    <li>
                        <a href="{{ url('admin') }}"><img src="assets/img/icons8-admin-24.png" alt="" width="20" height="20">Data Admin</a>
                    </li>

                </ul>
                <img src="assets/img/icons8-logout-32.png" alt="" width="20" height="20" class="icon-logout"><a href="/sesi/logout" class="navbar-logout" onclick="return validateLogout()">Keluar</a>
                <script>
                    function validateLogout() {
                        var konfirmasi = confirm('Anda yakin ingin logout?');

                        if (konfirmasi) {
                            // Lakukan tindakan logout, misalnya mengarahkan ke halaman logout
                            // Contoh:
                            window.location.href = "/sesi/logout";

                            alert('Logout berhasil');
                            return true; // Mengizinkan tautan untuk diikuti
                        } else {
                            // Jika pengguna membatalkan, tidak melakukan apa-apa
                            alert('Logout dibatalkan');
                            return false; // Mencegah tautan untuk diikuti
                        }
                    }
                </script>
        </div>
        <section>
            <div class="container-content-header">
                <header class="header-beranda">Beranda<a class="eng">/Dashboard</a></header>
            </div>

                <img src="{{('assets/img/Certification-cuate.png')}}" alt="" height="550" width="550" class="vector-dashboard">

        </section>
</body>
</html>
