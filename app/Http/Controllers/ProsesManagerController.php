<?php

namespace App\Http\Controllers;

use App\Models\SuratModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class ProsesManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua surat beserta barang terkait
        $suratList = SuratModel::with('barang')->get();

        // Tampilkan view dengan data surat
        return view('pages.proses-manager.index', compact('suratList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Temukan surat berdasarkan ID
        $surat = SuratModel::findOrFail($id);

        $barang = BarangModel::findOrFail($id);


        // Kembalikan tampilan dengan data surat dan barang terkait
        return view('pages.proses-manager.show', compact('surat', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        // Temukan surat berdasarkan ID
        $surat = SuratModel::findOrFail($id);

        // Set status surat menjadi "Selesai Di Proses Manager Klinik"
        $surat->status = 'Selesai Di Proses Manager Umum';
        $surat->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Surat berhasil diselesaikan prosesnya.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
