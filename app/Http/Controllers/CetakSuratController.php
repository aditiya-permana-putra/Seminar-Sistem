<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratModel;
use App\Models\BarangModel;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use App\Pdf\CustomFpdf; // Import the custom FPDF class


class CetakSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua surat beserta barang terkait
        $suratList = SuratModel::with('barang')->get();

        // Tampilkan view dengan data surat
        return view('pages.cetak-surat.index', compact('suratList'));
    }

    public function indexx()
    {
        // Ambil semua surat beserta barang terkait
        $suratList = SuratModel::with('barang')->get();

        // Tampilkan view dengan data surat
        return view('pages.cetak-surat.disposisi', compact('suratList'));
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
        return view('pages.cetak-surat.show', compact('surat', 'barang'));
    }

    function Header($pdf, $id)
    {

        $surat = SuratModel::findOrFail($id);

        // Mendapatkan lebar dan tinggi halaman
        $pageWidth = $pdf->GetPageWidth();
        $pageHeight = $pdf->GetPageHeight();

        // Menentukan koordinat awal dan akhir untuk persegi panjang (border)
        $borderX1 = 5;  // Koordinat X awal (kiri)
        $borderY1 = 5;  // Koordinat Y awal (atas)
        $borderX2 = $pageWidth - 5;  // Koordinat X akhir (kanan)
        $borderY2 = $pageHeight - 5;  // Koordinat Y akhir (bawah)

        // Menggambar border
        $pdf->Rect($borderX1, $borderY1, $borderX2 - $borderX1, $borderY2 - $borderY1);

        // Logo atau gambar kop surat
        $pdf->Image(public_path('assets/img/logo.png'), 10, 10, 40);

        // Font teks untuk kop surat
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->SetTextColor(0, 0, 255); // Atur warna ke biru dengan RGB (0, 0, 255)

        $pdf->Ln(3);

        // Posisi teks di sebelah kanan
        $pdf->Cell(80);
        // Judul pada kop surat
        $pdf->Cell(30, 10, 'PT NUSA LIMA MEDIKA', 0, 0, 'C');

        $pdf->Ln(8);

        $pdf->Cell(80);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetTextColor(0, 0, 255); // Atur warna ke biru dengan RGB (0, 0, 255)

        $pdf->Cell(30, 10, 'Jl. Ronggowarsito No. 40 Telp (0761) 28719 - 26744 Pekanbaru - Riau 28132', 0, 0, 'C');

        // Gambar garis horizontal
        $pdf->SetLineWidth(0.5); // Ketebalan garis
        $pdf->Line(5, 32, 205, 32); // Garis horizontal dari (10,40) ke (200,40)

        $pdf->SetFont('Times', 'B', 12);

        $pdf->SetLineWidth(0.5); // Ketebalan garis
        // Garis di atas kata "Permohonan"
        $pdf->Line(5, 49, 205, 49);

        $pdf->Ln(10);
        $pdf->SetTextColor(0, 0, 0); // Warna teks hitam
        $pdf->Cell(0, 10, 'PERMOHONAN PERBAIKAN', 0, 1, 'C'); // Teks tetap di tengah secara horizontal
        $pdf->Cell(0, 0, 'PERALATAN/MESIN/KENDARAAN/ELEKTRONIK/ALKES*)', 0, 1, 'C'); // Teks tetap di tengah secara horizontal
        $pdf->Cell(0, 10, 'Nomor : ' .   $surat->nomor_surat, 0, 1, 'C');
    }

    function Footer($pdf)
    {
        // Posisi di 1.5 cm dari bawah
        $pdf->SetY(-20);

        $pdf->Line(5, $pdf->GetY(), $pdf->GetPageWidth() - 5, $pdf->GetY());

        // Set warna teks ke biru
        $pdf->SetTextColor(0, 0, 255);
        // Tambahkan gambar di footer
        $imagePath = public_path('assets/img/ihc.png');
        $pdf->Image($imagePath, 170, 280, 30); // Ganti 10 dengan tinggi gambar yang diinginkan

        // Tentukan posisi X dan Y
        $x = 5; // 5 mm dari kiri
        $y = $pdf->GetPageHeight() - 20; // 20 mm dari bawah

        // Tambahkan teks email
        $imagePath = public_path('assets/img/email.png');
        $pdf->Image($imagePath, 10, 280, 50); // Ganti 10 dengan tinggi gambar yang diinginkan
    }



    public function cetak(Request $request, $id)
    {
        $barangIds = $request->input('barang');

        // Validasi jika tidak ada barang yang dipilih
        if (!$barangIds) {
            return redirect()->back()->with('error', 'Pilih setidaknya satu barang untuk dicetak.');
        }

        // Ambil data surat berdasarkan ID
        $surat = SuratModel::findOrFail($id);

        // Ambil daftar barang yang dipilih
        $selectedBarang = BarangModel::whereIn('id', $barangIds)->get();

        // Membuat PDF
        $pdf = new CustomFpdf();
        $pdf->AddPage();
        $this->Header($pdf, $id); // Panggil metode Header dengan menyertakan ID surat

        $pdf->SetFont('Times', '', 12);
        $colWidth1 = 50;
        $colWidth2 = 100;

        // Array untuk nama bulan dalam bahasa Indonesia
        $namaBulan = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );

        // Format tanggal menjadi "day month year" jika belum dalam format tersebut
        $formattedDate = date('d', strtotime($surat->tanggal)) . ' ' . $namaBulan[date('F', strtotime($surat->tanggal))] . ' ' . date('Y', strtotime($surat->tanggal));

        // Menampilkan tanggal dalam format yang diinginkan
        $pdf->Cell($colWidth1, 10, 'Tanggal', 0, 0);
        $pdf->Cell($colWidth2, 10, ': ' . $formattedDate, 0, 1);

        $pdf->Cell($colWidth1, 0, 'Pemohon', 0, 0);
        $pdf->Cell($colWidth2, 0, ': ' . $surat->user->name, 0, 1);

        $pdf->Cell($colWidth1, 10, 'Jabatan / Unit Kerja', 0, 0);
        $pdf->Cell($colWidth2, 10, ': ' . $surat->user->jabatan, 0, 1);


        $pdf->Cell($colWidth1, 0, 'Jenis Barang / Merk', 0, 0);
        $pdf->Cell($colWidth2, 0, ': ' . '-', 0, 1);


        $pdf->Cell($colWidth1, 10, 'Lokasi yang diminta', 0, 0);
        $pdf->Cell($colWidth2, 10, ': ' . '-', 0, 1);

        $header = ['No', 'Nama Barang', 'Uraian Masalah', 'Keterangan'];
        $w = [10, 40, 105, 35];

        $pdf->SetFont('Arial', 'B', 12);
        foreach ($header as $i => $col) {
            $pdf->Cell($w[$i], 10, $col, 1, 0, 'C');
        }
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        foreach ($selectedBarang as $index => $barang) {
            $nb = max(
                $pdf->NbLines($w[0], $index + 1),
                $pdf->NbLines($w[1], $barang->nama_barang),
                $pdf->NbLines($w[2], $barang->uraian_masalah),
                $pdf->NbLines($w[3], $barang->keterangan)
            );
            $h = 10 * $nb;

            $pdf->CheckPageBreak($h);

            $pdf->Cell($w[0], $h, $index + 1, 1, 0, 'C');
            $pdf->Cell($w[1], $h, $barang->nama_barang, 1);
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->MultiCell($w[2], 10, $barang->uraian_masalah, 1);
            $pdf->SetXY($x + $w[2], $y);
            $pdf->Cell($w[3], $h, $barang->keterangan, 1);
            $pdf->Ln();
        }

        // Tanda tangan kiri
        $pdf->SetFont('Times', '', 12); // Set font dan ukuran teks yang sesuai
        // Teks "*) Lingkari yang dibutuhkan"
        $pdf->SetXY(10, 225); // Atur posisi X dan Y
        $pdf->Cell(0, 0, '*) Lingkari yang dibutuhkan', 0, 1); // Tambahkan argument 1 pada posisi terakhir untuk pindah baris
        // Teks "Dibuat Oleh"
        $pdf->SetXY(10, 230); // Atur posisi X dan Y
        $pdf->Cell(0, 0, 'Diajukan Oleh', 0, 1); // Tambahkan argument 1 pada posisi terakhir untuk pindah baris

        // Ambil path gambar tanda tangan dari model Surat
        $signatureDataURI = $surat->user->ttd;

        // Pisahkan metadata dari data base64
        list($type, $signatureData) = explode(';', $signatureDataURI);
        list(, $signatureData) = explode(',', $signatureData);

        // Decode base64 menjadi data biner
        $signatureBinary = base64_decode($signatureData);

        // Tentukan path dan nama file untuk menyimpan gambar
        $signatureImagePath = public_path('assets/image/signature.png');

        // Simpan data gambar ke file
        file_put_contents($signatureImagePath, $signatureBinary);

        // Tambahkan tanda tangan (gambar) ke PDF dengan posisi dan ukuran yang sesuai
        $pdf->Image($signatureImagePath, 20, 235, 30, 15);

        // Teks "Koordinator Layananan"
        $pdf->SetXY(10, 257); // Atur posisi X dan Y
        $pdf->SetFont('Times', 'B', 12); // Set font tebal untuk Koordinator Layananan
        $pdf->Cell(0, 10, $surat->user->name, 0, 1); // Tambahkan argument 1 pada posisi terakhir untuk pindah baris

        // Tanda tangan kanan
        $pdf->SetFont('Times', '', 12); // Set font dan ukuran teks yang sesuai
        // Teks "Diajukan Oleh"
        $pdf->SetXY(150, 230); // Atur posisi X dan Y
        $pdf->Cell(0, 0, 'Disetujui Oleh', 0, 1); // Tambahkan argument 1 pada posisi terakhir untuk pindah baris

        // Ambil tanda tangan manager klinik dari database
        $managerKlinik = User::role('Manager Klinik')->first();
        $managerSignatureDataURI = $managerKlinik->ttd;

        // Pisahkan metadata dari data base64
        list($type, $managerSignatureData) = explode(';', $managerSignatureDataURI);
        list(, $managerSignatureData) = explode(',', $managerSignatureData);

        // Decode base64 menjadi data biner
        $managerSignatureBinary = base64_decode($managerSignatureData);

        // Tentukan path dan nama file untuk menyimpan gambar tanda tangan manager klinik
        $managerSignatureImagePath = public_path('assets/image/manager_signature.png');

        // Simpan data gambar ke file
        file_put_contents($managerSignatureImagePath, $managerSignatureBinary);

        // Tambahkan tanda tangan (gambar) ke PDF dengan posisi dan ukuran yang sesuai
        $pdf->Image($managerSignatureImagePath, 150, 235, 30, 15); // Sesuaikan posisi dan ukuran tanda tangan

        // Teks "Kepala Klinik"
        $pdf->SetFont('Times', 'B', 12); // Set font tebal untuk Kepala Klinik
        $pdf->SetXY(150, 248); // Atur posisi X dan Y
        $pdf->Cell(0, 28, $managerKlinik->name, 0, 1); // Tambahkan argument 1 pada posisi terakhir untuk pindah baris, 'R' untuk rata kanan

        $this->Footer($pdf);

        // Output PDF
        $pdf->Output('I', 'backsite.cetak_surat.pdf'); // Output PDF langsung ke browser dengan nama file "surat.pdf"
        exit;
    }



    public function cetakdisposisi(Request $request, $id)
    {
        // Temukan surat berdasarkan id
        $surat = SuratModel::findOrFail($id);

        // Temukan pengguna dengan peran "Manager Operasional & Umum"
        $pengirim = User::whereHas('roles', function ($query) {
            $query->where('name', 'Manager Operasional & Umum');
        })->first();

        $pengirim1 = User::whereHas('roles', function ($query) {
            $query->where('name', 'Kepala Bidang Operasional & Umum');
        })->first();

        // Jika pengirim ditemukan, ambil namanya, jika tidak, gunakan default
        $nama_pengirim = $pengirim ? $pengirim->name : 'Pengirim Tidak Ditemukan';
        $nama_pengirim1 = $pengirim1 ? $pengirim1->name : 'Pengirim Tidak Ditemukan';


        // Membuat objek FPDF dan menambahkan halaman
        $pdf = new FPDF();
        $pdf->AddPage();

        // Menambahkan judul
        $pdf->Ln(5); // Spasi vertikal
        $pdf->SetFont('Times', 'B', 18);
        $pdf->Cell(0, 10, 'RIWAYAT DISPOSISI', 0, 1, 'C');
        $pdf->Ln(5); // Spasi vertikal

        // Menambahkan tabel
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(40, 10, 'No Surat', 1);
        $pdf->Cell(0, 10, $surat->nomor_surat, 1);
        $pdf->Ln(); // Pindah ke baris baru
        $pdf->Cell(40, 10, 'Perihal Surat', 1);
        $pdf->MultiCell(0, 10, 'Pengajuan Maintenance Aset', 1);
        $pdf->Ln(); // Pindah ke baris baru

        $pdf->SetFont('Times', '', 12);
        $colWidth1 = 40;
        $colWidth2 = 100;
        $pdf->Cell($colWidth1, 10, 'Dari', 0, 0);
        $pdf->Cell($colWidth2, 10, ': ' . $nama_pengirim, 0, 1);
        $pdf->Cell($colWidth1, 10, 'Tujuan', 0, 0);
        $pdf->Cell($colWidth2, 10, ': ' . $nama_pengirim1, 0, 1);
        $pdf->Cell($colWidth1, 10, 'Waktu Disposisi', 0, 0);
        $pdf->Cell($colWidth2, 10, ': ' . $surat->tgl_disposisi, 0, 1);
        $pdf->Cell($colWidth1, 10, 'Disposisi', 0, 0);
        $pdf->Cell($colWidth2, 10, ': ' . $surat->disposisi, 0, 1);
        $pdf->Cell($colWidth1, 10, 'Catatan', 0, 0);
        $pdf->Cell($colWidth2, 10, ': ' . $surat->status, 0, 1);


        // Output PDF ke browser
        header('Content-Type: application/pdf');
        $pdf->Output();
        exit;
    }
}
