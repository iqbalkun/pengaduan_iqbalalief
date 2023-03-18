<?php

namespace App\Http\Controllers;

use App\Models\petugaz;
use App\Http\Requests\StorepetugazRequest;
use App\Http\Requests\UpdatepetugazRequest;
use App\Models\User;

class PetugazController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugaz = Petugaz::all();
        return view('petugas.petugas',compact('petugaz'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepetugazRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepetugazRequest $request)
    {
        $data1['idPetugas']=$request->idPetugas;
        $data1['namaPetugas']=$request->namaPetugas;
        $data1['telp']=$request->telp;
        $data2['username']=$request->username;
        $data2['name']=$request->name;
        $data2['password']=$request->password;
        $data2['email']=$request->email;
        $data2['level']='2';
        petugaz::create($data1);

        
        $data2['username']=$request->username;
        $data2['name']=$request->name;
        $data2['password']=$request->password;
        $data2['email']=$request->email;
        $data2['level']='2';

        User::create($data2);

        // Petugaz::create([
        //     'idPetugas'=> $request->idPetugas,
        //     'namaPetugas' =>$request->namaPetugas,
        //     'username' =>$request->username,
        //     'password' =>bcrypt($request->password),
        //     'telp' =>$request->telp,
        //     'email' =>$request->email,
        //     'level'=> '2',
        // ]);
        return redirect('petugaz')->with('success','data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\petugaz  $petugaz
     * @return \Illuminate\Http\Response
     */
    public function show(petugaz $petugaz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\petugaz  $petugaz
     * @return \Illuminate\Http\Response
     */
    public function edit(petugaz $petugaz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepetugazRequest  $request
     * @param  \App\Models\petugaz  $petugaz
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepetugazRequest $request, petugaz $petugaz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\petugaz  $petugaz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        petugaz::find($id)->delete();
        return redirect('petugas')->with('success','data berhasil dihapus');
    }
}
