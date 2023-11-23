<?php

namespace App\Http\Controllers;

use App\Models\sertifikat;
use Dompdf\FrameReflower\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Repsonse;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    $katakunci = $request->katakunci;
    $jumlahbaris = 4;
    if(strlen($katakunci)) {
        $data2 = sertifikat::where('id', 'like', "%$katakunci%")
        ->orWhere('nisn', 'like', "%$katakunci%")
        ->orWhere('nomor', 'like', "%$katakunci%")
        ->paginate($jumlahbaris);
    } else {
        $data2 = sertifikat::orderBy('id')->paginate($jumlahbaris);
    }
    {
        return view('cek-sertifikat')->with('data2', $data2);
    }
}
public function table(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)) {
            $data2 = sertifikat::where('id', 'like', "%$katakunci%")
            ->orWhere('nisn', 'like', "%$katakunci%")
            ->orWhere('nomor', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data2 = sertifikat::orderBy('id')->paginate($jumlahbaris);
        }
        if ($data2->isEmpty()) {
            return view('table-user')->with('data2', $data2)
                                      ->with('message', 'Data tidak ditemukan, pastikan NISN dan Kode Sertifikat sudah benar.');
        }

        {
            return view('table-user')->with('data2', $data2);
        }
    }
public function table2(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)) {
            $data2 = sertifikat::where('id', 'like', "%$katakunci%")
            ->orWhere('nisn', 'like', "%$katakunci%")
            ->orWhere('nomor', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data2 = sertifikat::orderBy('id')->paginate($jumlahbaris);
        }
        {
            return view('cetak')->with('data2', $data2);
        }
    }

    public function destroy(string $id)
    {

        $data2 = sertifikat::where('id', $id)->first();
        File::delete(public_path('image'). '/' . $data2->image);
        sertifikat::where('id', $id)->delete();
        return redirect()->to('table-user');
    }




}

