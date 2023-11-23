<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LS | Data Sertifikat</title>
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
                <header class="header-beranda">Data Sertifikat<a class="eng">/Certification Data</a></header>
            </div>
            <div class="container-form-input-data">
                <h2 class="font-form" >Tambah Data ?</h2>
                @if ($errors->any())
                <div class="pt-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                            <li>{{$item}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                @endif
                <form action="{{url('sertifikat')}}" class="form-data" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="id" class="label-form-input-data-one">ID :</label>
                    <input type="number" name="id"  class="input-form-one" value="{{Session::get('id')}}" id="id">
                    <br>
                    <label for="nisn" class="label-form-input-data-two">NISN :</label>
                    <input type="number" name="nisn"  class="input-form-two" value="{{Session::get('nisn')}}" id="nisn">
                    <br>
                    <label for="nomor" class="label-form-input-data-three">Kode Sertifikat :</label>
                    <input type="text" name="nomor"  class="input-form-three" value="{{Session::get('nomor')}}" id="nomor">
                    <br>
                    <label for="image" class="label-form-input-data-four">Gambar Sertifikat :</label>
                    <input type="file" name="image"  class="input-form-four" value="{{Session::get('gambar')}}" id="image">
                    <br>
                    <input type="submit" value="sumbit" class="button-input-data-one">
                </form>
            </div>
        </section>
        <section class="container-tabel-data">
            <div class="tabel-data-one">
                <h3>Data Sertifikat</h3>
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID</th>
                            <th>NISN</th>
                            <th>Kode Sertifikat</th>
                            <th>Gambar Sertifikat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nisn}}</td>
                            <td>{{$item->nomor}}</td>
                            <td>
                                @if ($item->image)
                                <a href="{{ url('image', $item->image) }}" download="{{ $item->image }}">
                                    <img style="width: 60px; height: 60px;" src="{{ url('image').'/'.$item->image }}" />
                                </a>
                                <br>
                                <span class="action-btn">
                                <a href="{{ url('image', $item->image) }}" download="{{ $item->image }}">
                                    <button class="delete">Download</button>
                                </a>
                            </span>
                                @endif
                            </td>


                            <td>
                                <span class="action-btn">
                                    <a href="{{url ('sertifikat/'. $item->id.'/edit')}}" class="edit">Edit</a>

                                    <form onsubmit="return confirm('apakah anda yakin untuk menghapus')" action="{{url ('sertifikat/'.$item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete">Delete</button>
                                    </form>

                                </span>
                            </td>
                        </tr>
                        <?php $i++ ?>
                         @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </section>
</body>
</html>
