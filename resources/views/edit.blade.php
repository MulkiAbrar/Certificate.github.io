<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACAL SERTIFIKAT | Edit Data Sertifikat</title>
    <!-- LINK TO CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/edit.css')}}">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/png">
</head>
<body>
    <div class="container-edit-data">
        <h1 class="content-edit-data">Edit Data ?</h1>
        <a href="data-sertifikat.html" class="back">< Kembali</a>
        <div class="wrapper-form-edit">
            <form action="{{url ('sertifikat/'.$data->id)}}" class="form-data" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="id" class="label-form-input-data-one">ID :</label>
                <input readonly value="{{ $data->id }}"  class="input-form-one">
                <br>
                <label for="nisn" class="label-form-input-data-two">NISN :</label>
                <input type="number" id="nisn" name="nisn" value="{{ $data->nisn }}"  class="input-form-two">
                <br>
                <label for="nomor" class="label-form-input-data-three">Kode Sertifikat :</label>
                <input type="text" id="nomor" name="nomor" value="{{ $data->nomor }}"  class="input-form-three">
                <br>
                {{-- @if ($data->image)
                <div class="mb-3">
                    <img style="max-width:50px;max-height:50px" src="{{url('image'). '/' . $data->image}}">
                </div>
                @endif --}}
                <label for="image" class="label-form-input-data-four">Gambar Sertifikat :</label>
                <input type="file" id="image" name="image"  class="input-form-four">
                <br>
                <input type="submit" value="submit" class="button-input-data-one">
            </form>
        </div>
    </div>
</body>
</html>
