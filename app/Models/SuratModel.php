<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratModel extends Model
{
    use HasFactory;

    public $table = 'surat';


    protected $fillable = [
        'user_id', 'nomor_surat', 'tanggal', 'lokasi', 'status', 'lampiran', 'tgl_disposisi', 'disposisi'
    ];

    public function barang()
    {
        return $this->hasMany(BarangModel::class, 'surat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
