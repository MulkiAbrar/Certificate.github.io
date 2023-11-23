<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class penggunaControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pengguna::orderBy('id', 'desc')->paginate(3);
        return View('data-user')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('data-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id',$request->id);
        Session::flash('nama',$request->nama);
        Session::flash('nisn',$request->nisn);
        $request->validate([
            'id'=>'required|numeric|unique:pengguna,id',
            'nama'=>'required',
            'nisn'=>'required|numeric|unique:pengguna,nisn',
        ],[
            'id.required'=>'id wajib di isi',
            'id.unique'=>'id sudah di isi',
            'nama.required'=>'nama wajib di isi',
            'nisn.unique'=>'nisn sudah di ada',
            'nisn.required'=>'nisn wajib di isi',
        ]);
        $data = [
            'id'=>$request->id,
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
        ];
        pengguna::create($data);
        return redirect()->to('pengguna');
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
    public function edit( string $id)
    {
        $data = pengguna::where('id',$id)->first();
        return view('edit-user')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'nisn'=>'required'
        ],[
            'nama.required'=>'nama Tidak Boleh Kosong',
            'nisn.required'=>'NISN Tidak Boleh Kosong',
        ]);
        $data =[
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
        ];
        pengguna::where('id',$id)->update($data);
        return redirect()->to('pengguna')->with('Data Berhasil Di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pengguna::where('id',$id)->delete();
        return redirect()->to('pengguna');
    }
}
