<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuruImport;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        return view('guru.guru',compact('guru'));
        
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
     * @param  \App\Http\Requests\StoreGuruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuruRequest $request)
    {
        try {
            Guru::create($request->all());
            return redirect('guru')->with('succes','Data guru ditambahkan');
        } catch (QueryException $error) {
            DB::rollback();
            return redirect('guru')->with('error','terjadi kesalahan'.$error->getMessage());
        }
        DB::commit();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuruRequest  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuruRequest $request, Guru $guru)
    {
        $guru->update($request->all());
        return redirect('guru')->with('success','update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Guru::find($id)->delete();
        return redirect('guru')->with('success','data berhasil dihapus');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new GuruExport, $date.'_paket.xlsx');
    }
    
    public function importData(){
        Excel::import(new GuruImport, request()->file('import'));
         return redirect(request()->segment(1))->with('success','Import data Paket berhasil');
    }
}