<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = admin::orderBy('id', 'desc')->paginate(3);
        return view('data-admin')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id',$request->id);
        Session::flash('nama',$request->nama);
        Session::flash('nisn', $request->nisn);
        $request->validate([
            'id'=>'required|numeric|unique:admin,id',
            'nama'=>'required',
            'nisn'=>'required|numeric|unique:admin,nisn'
        ],[
            'id.required'=>'id wajib di isi',
            'id.unique'=>'id sudah di isi',
            'nama.required'=>'nama wajib di ada',
            'nisn.unique'=>'nisn sudah di isi',
            'nisn.required'=>'nisn wajib di isi',
        ]);
        $data = [
            'id'=> $request->id,
            'nama'=> $request->nama,
            'nisn'=> $request->nisn,
        ];
        admin::create($data);
        return redirect()->to('admin');
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
        $data = admin::where('id',$id)->first();
        return view('edit-admin')->with('data',$data);
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

            'nama.required'=>'nama wajib di ada',
            'nisn.required'=>'nisn wajib di isi',
        ]);
        $data = [
            'nama'=> $request->nama,
            'nisn'=> $request->nisn,
        ];
        admin::where('id',$id)->update($data);
        return redirect()->to('admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        admin::where('id',$id)->delete();
        return redirect()->to('admin');
    }
}
