<?php

namespace App\Http\Controllers;


use App\Models\sertifikat;
use Dotenv\Store\File\Paths;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class sertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)) {
            $data = sertifikat::where('id', 'like', "%$katakunci%")
            ->orWhere('nisn', 'like', "%$katakunci%")
            ->orWhere('nomor', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = sertifikat::orderBy('id')->paginate($jumlahbaris);
        }

        return view('data-sertifikat')->with('data', $data);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('data-sertifikat');
    }

    /**
     * Store a newly created resource in     storage.
     */
    public function store(Request $request)
    {


        Session::flash('id', $request->id);
        Session::flash('nisn', $request->nisn);
        Session::flash('nomor', $request->nomor);

        $request->validate([
            'id' => 'required|numeric|unique:sertifikat,id',
            'nisn' => 'required|numeric',
            'nomor' => 'required|unique:sertifikat,nomor',
            'image' => 'required|mimes:jpeg,jpg,png',

        ], [
            'id.required' => 'id wajib di isi',
            'id.unique' => 'id sudah di isi',
            'nisn.required' => 'nisn wajib di isi',
            'nomor.unique' => 'kode sudah di ada',
            'nomor.required' => 'kode wajib di isi',
            'image.required' => 'image harus di isi',
            'image.mimes' => 'image harus berupa JPEG, JPG, PNG'
        ]);

        $image_file = $request->file('image');
        $image_ekstensi = $image_file->extension();
        $image_nama = date('ymdhis') . "." . $image_ekstensi;
        $image_file->move(public_path('image'), $image_nama);

        $data = [
            'id' => $request->id,
            'nisn' => $request->nisn,
                'nomor' => $request->nomor,
            'image' => $image_nama,
        ];
        $data2 = [
            'id' => $request->id,
            'nisn' => $request->nisn,
                'nomor' => $request->nomor,
            'image' => $image_nama,
        ];
        sertifikat::create($data,$data2);
        return redirect()->to('sertifikat')->with('success', 'data berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = sertifikat::where('id', $id)->first();
        return view('edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nisn' => 'required',
            'nomor' => 'required',
        ], [
            'nisn.required' => 'NISN tidak boleh kosong',
            'nomor.required' => 'kode sertifikat Tidak Boleh Kosong',
        ]);
        $data = [
            'nisn' => $request->nisn,
            'nomor' => $request->nomor,
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png',
            ], [
                'image.mimes' => 'image harus berupa JPEG, JPG, PNG'
            ]);

            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_nama = date('ymdhis') . "." . $image_ekstensi;
            $image_file->move(public_path('image'), $image_nama);

            $data_image = sertifikat::where('id', $id)->first();
            File::delete(public_path('image').'/'.$data_image->image);

            $data = [
                'image' => $image_nama
            ];
        }
        sertifikat::where('id', $id)->update($data);
        return redirect()->to('sertifikat')->with('Data Berhasil Di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = sertifikat::where('id', $id)->first();
        File::delete(public_path('image'). '/' . $data->image);
        sertifikat::where('id', $id)->delete();
        return redirect()->to('sertifikat');


    }





}

