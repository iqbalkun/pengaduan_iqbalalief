<?php

namespace App\Http\Controllers;

use App\Exports\ExportKehadiran;
use App\Models\kehadiran;
use App\Http\Requests\StorekehadiranRequest;
use App\Http\Requests\UpdatekehadiranRequest;
use App\Imports\ImportKehadiran;
use Maatwebsite\Excel\Facades\Excel;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kehadiran'] = Kehadiran::get();
        return view('kehadiran.index')->with($data);
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
     * @param  \App\Http\Requests\StorekehadiranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekehadiranRequest $request)
    {
        Kehadiran::create($request->all());
        return redirect('kehadiran')->with('succes', 'Data kehadiran ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(kehadiran $kehadiran)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function edit(kehadiran $kehadiran)
    {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekehadiranRequest  $request
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekehadiranRequest $request,$id)
    {
        $kehadiran = Kehadiran::where("id", $id)->first();
        $kehadiran->namaKaryawan = $request->namaKaryawan;
        $kehadiran->tanggalMasuk = $request->tanggalMasuk;
        $kehadiran->waktuMasuk = $request->waktuMasuk;
        $kehadiran->status = $request->status;
        $kehadiran->waktuKeluar = $request->waktuKeluar;
        $kehadiran->update();
        return redirect('kehadiran')->with('success', 'data berhasil dihapus');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kehadiran  $kehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kehadiran::find($id)->delete();
        return redirect('kehadiran')->with('success', 'data berhasil dihapus');
    }

    public function importData(){
        Excel::import(new ImportKehadiran,request()->file('import'));
        return redirect('kehadiran')->with('success', 'import data berhasil');

    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new ExportKehadiran, $date . '_absen.xlsx');
    }
}
