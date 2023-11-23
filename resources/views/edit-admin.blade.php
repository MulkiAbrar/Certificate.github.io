<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACAL SERTIFIKAT | Edit Data Admin</title>
    <!-- LINK TO CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/edit.css')}}">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/png">
</head>
<body>
    <div class="container-edit-data">
        <h1 class="content-edit-data">Edit Data ?</h1>
        <a href="{{url('admin')}}" class="back">< Kembali</a>
        <div class="wrapper-form-edit">
            <form action="{{url('admin/'.$data->id)}}" class="form-data" method="post">
                @csrf
                @method('PUT')
                <label for="id" class="label-form-input-data-one">ID :</label>
                <input readonly value="{{ $data->id }}"class="input-form-Admin-one">
                <br>
                <label for="nama" class="label-form-input-data-two">Nama  :</label>
                <input type="text" id="nama" name="nama" value="{{ $data->nama}}" class="input-form-Admin-two">
                <br>
                <label for="nisn" class="label-form-input-data-three">NISN :</label>
                <input type="number" id="nisn" name="nisn" value="{{ $data->nisn}}"   class="input-form-Admin-three">
                <br>
                <input type="submit" value="submit" class="button-input-data-one">
            </form>
        </div>
    </div>
</body>
</html>
