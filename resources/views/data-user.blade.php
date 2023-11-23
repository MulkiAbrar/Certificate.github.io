<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LS | Data User</title>
    <!-- LINK TO CSS -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
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
                        <a href="{{url('dashboard')}}"><img src="assets/img/icons8-dashboard-32.png" alt="" width="15" height="15"> Beranda</a>
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
        <section class="wrapping-data">
            <div class="container-content-header">
                <header class="header-beranda">Data User<a class="eng">/user's Data</a></header>
            </div>
            <div class="container-form-input-data">
                <h2 class="font-form" >Tambah Data ?</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{url ('pengguna')}}" class="form-data" method="post">
                    @csrf
                    <label for="id" class="label-form-input-data-one">ID :</label>
                    <input type="number" id="id" name="id" value="{{Session::get('id')}}" class="input-formuser-one">
                    <br>
                    <label for="nama" class="label-form-input-data-two">Nama :</label>
                    <input type="text" id="nama" name="nama" value="{{Session::get('nama')}}" class="input-formuser-two">
                    <br>
                    <label for="nisn" class="label-form-input-data-three">NISN:</label>
                    <input type="number" id="nisn" name="nisn" value="{{Session::get('nisn')}}" class="input-formuser-three">
                    <br>
                    <input type="submit" value="submit" class="button-input-data">
                </form>
            </div>
        </section>
        <section class="container-tabel-data">
            <div class="tabel-data-one">
                <h3>Data User</h3>
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->nisn}}</td>
                            <td>
                                <span class="action-btn">
                                    <a href="{{ url ('pengguna/'.$item->id.'/edit')}}" class="edit">Edit</a>
                                    <form onsubmit="return confirm('apakah anda yakin untuk menghapus')" action="{{url ('pengguna/'.$item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button class="delete">Delete</button></form>
                                </span>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach

                    </tbody>
                </table>
                {{ $data->links()}}
            </div>
        </section>
</body>
</html>
