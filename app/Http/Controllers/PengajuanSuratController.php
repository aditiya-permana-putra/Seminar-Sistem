<?php

namespace App\Http\Controllers;

use App\Models\SuratModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua surat beserta barang terkait
        $suratList = SuratModel::with('barang')->get();

        // Tampilkan view dengan data surat
        return view('pages.pengajuan-surat.index', compact('suratList'));
    }

    public function rejectBarang(Request $request, $id)
    {
        // Temukan barang berdasarkan ID
        $barang = BarangModel::findOrFail($id);

        // Validasi input
        $request->validate([
            'status_manager' => 'required|string|max:255',
        ]);

        // Set status barang menjadi "Ditolak Manager Klinik" dan simpan alasan penolakan
        $barang->status = 'Ditolak Manager Klinik';
        $barang->status_manager = $request->status_manager;
        $barang->save();

        // Set status surat terkait jika diperlukan
        $surat = $barang->surat;
        if ($surat) {
            $surat->status = 'Sedang Di Proses Manager Klinik';
            $surat->save();
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Barang berhasil ditolak.');
    }

    public function approveBarang(Request $request, $id)
    {
        // Temukan barang berdasarkan ID
        $barang = BarangModel::findOrFail($id);

        // Validasi input
        $request->validate([
            'status_manager' => 'required|string|max:255',
        ]);

        // Set status barang menjadi "Ditolak Manager Klinik" dan simpan alasan penolakan
        $barang->status = 'Disetujui Manager Klinik';
        $barang->status_manager = $request->status_manager;
        $barang->save();

        // Set status surat terkait jika diperlukan
        $surat = $barang->surat;
        if ($surat) {
            $surat->status = 'Sedang Di Proses Manager Klinik';
            $surat->save();
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Barang berhasil setujui.');
    }


    public function approveBarangkabid(Request $request, $id)
    {
        // Temukan barang berdasarkan ID
        $barang = BarangModel::findOrFail($id);

        // Validasi input
        $request->validate([
            'status_manager' => 'required|string|max:255',
            'biaya' => 'required|string|max:255',

        ]);

        // Set status barang menjadi "Ditolak Manager Klinik" dan simpan alasan penolakan
        $barang->status = 'Disetujui Kepala Bidang';
        $barang->status_manager = $request->status_manager;
        $barang->biaya = $request->biaya;
        $barang->save();

        // Set status surat terkait jika diperlukan
        $surat = $barang->surat;
        if ($surat) {
            $surat->status = 'Sedang Di Proses Kepala Bidang';
            $surat->save();
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Barang disetujui dengan biaya yang ditentukan.');
    }

    public function rejectBarangkabid(Request $request, $id)
    {
        // Temukan barang berdasarkan ID
        $barang = BarangModel::findOrFail($id);

        // Validasi input
        $request->validate([
            'status_manager' => 'required|string|max:255',
        ]);

        // Set status barang menjadi "Ditolak Manager Klinik" dan simpan alasan penolakan
        $barang->status = 'Ditolak Kepala Bidang';
        $barang->status_manager = $request->status_manager;
        $barang->save();

        // Set status surat terkait jika diperlukan
        $surat = $barang->surat;
        if ($surat) {
            $surat->status = 'Sedang Di Proses Kepala Bidang';
            $surat->save();
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Barang berhasil ditolak.');
    }

    public function uploadPdf(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'lampiran' => 'required|file|mimes:pdf|max:2048', // Maksimum 2MB
        ]);

        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $newPDF = time() . '_' . $lampiran->getClientOriginalName();

            // Menyimpan file PDF ke dalam direktori storage/app/public/lampiran
            $lampiran->storeAs('public/lampiran', $newPDF);

            // Update atribut lampiran pada surat dengan path relatif ke file PDF
            $surat = SuratModel::findOrFail($id);
            $surat->lampiran = 'lampiran/' . $newPDF;
            $surat->save();

            return redirect()->back()->with('success', 'File PDF berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file PDF.');
    }


    public function disposisi(Request $request, $id)
    {
        $surat = SuratModel::findOrFail($id);

        // Validasi input
        $request->validate([
            'pilihan' => 'required|array',
            'status' => 'required|string|max:255',
        ]);

        // Proses disposisi
        $disposisi = implode(', ', $request->pilihan);
        $surat->disposisi = 'Setuju,' . $disposisi;
        $surat->status = $request->status;

        $surat->tgl_disposisi = now();
        $surat->save();

        foreach ($surat->barang as $barang) {
            if ($barang->status !== 'Ditolak Manager Klinik') {
                $barang->status = 'Sudah Disposisi Manager';
                $barang->save();
            }
        }


        return redirect()->back()->with('success', 'Surat berhasil disposisi.');
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
        return view('pages.pengajuan-surat.show', compact('surat', 'barang'));
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
        $surat->status = 'Selesai Di Proses Manager Klinik';
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
