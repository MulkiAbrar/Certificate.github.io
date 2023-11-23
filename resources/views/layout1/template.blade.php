<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACAK SERTIFIKAT | Login Admin           </title>
    <!-- LINK TO CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/admin.css') }}">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/kacapembesar-icon.png') }}" type="image/png">

</head>
</html>
@if (Session::has('success'))
<div class="container"></div>

@endif
@include('komponen.pesan')
@yield('konten')
