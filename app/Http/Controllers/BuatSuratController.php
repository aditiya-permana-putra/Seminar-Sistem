<?php

namespace App\Http\Controllers;

use Log;
use App\Models\SuratModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuatSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.buat-surat.index');
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
        // Validasi data input
        $validatedData = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'jenis_barang' => 'required|array',
            'jenis_barang.*' => 'required|string|max:255',
            'nama_barang' => 'required|array',
            'nama_barang.*' => 'required|string|max:255',
            'uraian_masalah' => 'required|array',
            'uraian_masalah.*' => 'required|string',
            'keterangan' => 'nullable|array',
            'keterangan.*' => 'nullable|string',
            // 'gambar' => 'required|array',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk gambar
        ]);

        // Buat surat baru
        $surat = SuratModel::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'user_id' => Auth::id(), // Menyimpan user_id dari pengguna yang sedang login
        ]);

        // Iterasi melalui setiap jenis barang
        foreach ($request->jenis_barang as $index => $jenis_barang) {
            $barangData = [
                'jenis_barang' => $jenis_barang,
                'nama_barang' => $request->nama_barang[$index],
                'uraian_masalah' => $request->uraian_masalah[$index],
                'keterangan' => $request->keterangan[$index] ?? null,
            ];

            // Jika ada gambar yang diunggah untuk barang tertentu
            if ($request->hasFile('gambar.' . $index) && $request->file('gambar.' . $index)->isValid()) {
                $foto = $request->file('gambar.' . $index);
                $imageName = time() . '_' . $foto->getClientOriginalName();
                $foto->move(public_path('assets/image'), $imageName);

                // Simpan nama gambar ke dalam data barang
                $barangData['gambar'] = $imageName;
            }

            // Buat data barang terkait surat
            $surat->barang()->create($barangData);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Surat dan barang berhasil disimpan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan surat berdasarkan ID
        $surat = SuratModel::findOrFail($id);

        // Hapus semua barang terkait dengan surat ini
        foreach ($surat->barang as $barang) {
            // Hapus file gambar jika ada
            if ($barang->gambar && file_exists(public_path('assets/image/' . $barang->gambar))) {
                unlink(public_path('assets/image/' . $barang->gambar));
            }

            // Hapus barang dari database
            $barang->delete();
        }

        // Hapus surat dari database
        $surat->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('buat-surat.index')->with('success', 'Surat dan barang terkait berhasil dihapus.');
    }
}
