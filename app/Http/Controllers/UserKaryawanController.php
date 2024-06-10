<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $user = User::all(); // Ambil semua data dari tabel cuti

        return view('pages.unit.index', compact('user'));
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
    public function show(string $id)
    {
        //
        $user = User::findOrFail($id);

        return view('pages.unit.detail', compact('user'));
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
    // public function update(Request $request, string $id)
    // {
    //     // Mendapatkan pengguna berdasarkan ID
    //     $user = User::findOrFail($id);

    //     // Validasi input
    //     $request->validate([
    //         'name' => 'required|string|max:30',
    //         'emailuser' => 'required|string|max:50',
    //         'no_rek' => 'required|string|max:30',
    //         'nama_rekening' => 'required|string|max:30',
    //         'jabatan' => 'required|string|max:100',
    //         'divisi' => 'required|string|max:100',
    //         'unit_kerja' => 'required|string|max:30',
    //         'no_unit' => 'required|string|max:30',
    //         'no_kk' => 'required|string|max:30',
    //         'no_nik' => 'required|string|max:30',
    //         'jenis_kelamin' => 'required|string|max:30',
    //         'lulusan' => 'required|string|max:30',
    //         'alamat' => 'required|string|max:30',
    //         'tempat_lahir' => 'required|string|max:30',
    //         'tanggal_lahir' => 'required|string|max:30',
    //         'agama' => 'required|string|max:30',
    //         'kontak' => 'required|string|max:30',
    //         'foto' => 'image|mimes:jpeg,png,jpg,gif',
    //     ], [
    //         'name.required' => 'Nama diperlukan.',
    //         'name.max' => 'Nama tidak boleh lebih dari 25 karakter.',
    //     ]);

    //     // Inisialisasi variabel $data
    //     $data = [
    //         'name' => $request->name,
    //         'emailuser' => $request->emailuser,
    //         'no_rek' => $request->no_rek,
    //         'nama_rekening' => $request->nama_rekening,
    //         'jabatan' => $request->jabatan,
    //         'divisi' => $request->divisi,
    //         'unit_kerja' => $request->unit_kerja,
    //         'no_unit' => $request->no_unit,
    //         'no_kk' => $request->no_kk,
    //         'no_nik' => $request->no_nik,
    //         'jenis_kelamin' => $request->jenis_kelamin,
    //         'lulusan' => $request->lulusan,
    //         'alamat' => $request->alamat,
    //         'tempat_lahir' => $request->tempat_lahir,
    //         'tanggal_lahir' => $request->tanggal_lahir,
    //         'agama' => $request->agama,
    //         'kontak' => $request->kontak,
    //     ];

    //     // Memeriksa apakah ada file gambar yang diunggah
    //     if ($request->hasFile('foto')) {
    //         $foto = $request->file('foto');
    //         $newImage = time() . '_' . $foto->getClientOriginalName();
    //         $foto->storeAs('public/foto_user', $newImage); // Menyimpan foto ke dalam folder storage/app/public/foto_user

    //         // Hapus foto lama jika ada
    //         if ($user->foto) {
    //             Storage::delete('foto_user/' . $user->foto);
    //         }

    //         // Mengupdate variabel $data dengan foto baru
    //         $data['foto'] = $newImage;
    //     }

    //     // Mengupdate data pengguna
    //     $user->update($data);

    //     // Redirect ke halaman detail unit dengan pesan sukses
    //     return redirect()->route('unit.index')->with('success', 'User Updated Successfully');
    // }


    public function saveSignature(Request $request)
    {
        // Validasi jika diperlukan
        $request->validate([
            'signature' => 'required', // Sesuaikan dengan kebutuhan validasi Anda
        ]);

        // // Simpan tanda tangan ke dalam kolom 'ttd' pada model User yang sesuai dengan pengguna yang sedang masuk
        $user = auth()->user(); // Mendapatkan informasi user yang sedang login
        $user->ttd = $request->input('signature');
        $user->save();



        // Redirect kembali dengan pesan sukses
        return redirect()->route('unit.index')->with('success', 'User Updated Successfully');
    }
}
