<?php

namespace App\Http\Controllers;

use App\Exports\ExportKehadiran;
use App\Models\laporanBug;
use App\Http\Requests\StorelaporanBugRequest;
use App\Http\Requests\UpdatelaporanBugRequest;
use App\Imports\ImportlaporanBug;
use Maatwebsite\Excel\Facades\Excel;

class LaporanBugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporanBug = laporanBug::all();
        return view('laporanbug.index', compact('laporanBug'));
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
     * @param  \App\Http\Requests\StorelaporanBugRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelaporanBugRequest $request)
    {
        laporanBug::create($request->all());
        return redirect('laporanbug')->with('succes', 'Data kehadiran ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laporanBug  $laporanBug
     * @return \Illuminate\Http\Response
     */
    public function show(laporanBug $laporanBug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporanBug  $laporanBug
     * @return \Illuminate\Http\Response
     */
    public function edit(laporanBug $laporanBug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelaporanBugRequest  $request
     * @param  \App\Models\laporanBug  $laporanBug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelaporanBugRequest $request,$id)
    {
        $laporanBug = laporanBug::where("id", $id)->first();
        $laporanBug->jenis = $request->jenis;
        $laporanBug->deskripsi = $request->deskripsi;
        $laporanBug->tgl_kejadian = $request->tgl_kejadian;
        $laporanBug->pelapor = $request->pelapor;
        $laporanBug->status = $request->status;
        $laporanBug->update();
        return redirect('laporanbug')->with('succes', 'Data kehadiran diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporanBug  $laporanBug
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporanBug $laporanBug)
    { 
            $laporanBug->delete();
            return redirect('laporanbug')->with('success-delete', 'Data Berhasil Dihapus');
        
    }
    public function importData()
    {
        Excel::import(new ImportlaporanBug, request()->file('import'));
        return redirect(request()->segment(1))->with('success', 'Import data Paket berhasil');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new ExportKehadiran, $date . '_laporan.xlsx');

    }
}
