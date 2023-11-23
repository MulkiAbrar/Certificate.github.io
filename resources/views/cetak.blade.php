<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACAK SERTIFIKAT | Data Sertifikat</title>
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
            <header class="font-sidebar">Hello! User!</header>
                <ul class="navbar-list">

                </ul>
                <img src="assets/img/icons8-logout-32.png" alt="" width="30" height="30" class="icon-logout"><a href="{{url('/cek')}}" class="navbar-logout">Keluar</a>
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

            </div>
        </section>
        <section class="container-tabel-data">
            <div class="tabel-data-one">
                <h3>Data Sertifikat</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Gambar Sertifikat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data2->firstItem()?>
                        @foreach ($data2 as $item)
                        <td>
                            @if ($item->image)
                            <a href="{{ url('image', $item->image) }}" download="{{ $item->image }}">
                                <img style="width: 60px; height: 60px;" src="{{ url('image').'/'.$item->image }}" />
                            </a>
                            <br>
                            <a href="{{ url('image', $item->image) }}" download="{{ $item->image }}">
                                <button class="edit">Download</button>
                            </a>
                            @endif
                        </td>

                            <td>
                                <span class="action-btn">
                                    <a href="{{url ('sertifikat/'. $item->id.'/edit')}}" class="edit">Edit</a>
                                    <a href="{{url('table-cetak')}}"class="edit">Cetak</a>
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
                {{ $data2->links() }}
            </div>
        </section>
</body>
</html>
