<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    public $table = 'barang';


    protected $fillable = [
        'surat_id',
        'jenis_barang',
        'nama_barang',
        'uraian_masalah',
        'keterangan',
        'gambar',
        'biaya',
        'status',
        'status_manager',
    ];

    public function surat()
    {
        return $this->belongsTo(SuratModel::class, 'surat_id');
    }
}
