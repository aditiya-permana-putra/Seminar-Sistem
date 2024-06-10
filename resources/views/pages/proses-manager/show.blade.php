@extends('layouts.master')

@section('title', 'Detail Surat')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat</h1>
        <a href="{{ route('proses-manager.index') }}" class="btn btn-primary">Kembali</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Detail Surat
        </div>
        <div class="card-body">
            <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
            <p><strong>Pengirim:</strong> {{ $surat->user->name }}</p>
            <p><strong>Tanggal:</strong> {{ $surat->tanggal }}</p>
            <p><strong>Lokasi:</strong> {{ $surat->lokasi }}</p>
            <p><strong>Status:</strong> {{ $surat->status }}</p>
            <p> <!-- Button untuk membuka modal lampiran -->
                <button type="button" class="btn btn-link" data-toggle="modal"
                    data-target="#lampiranModal{{ $surat->id }}">
                    <i class="fas fa-eye"></i> Lihat Lampiran <!-- Icon mata -->
                </button>
                <!-- Modal lampiran -->
            <div class="modal fade" id="lampiranModal{{ $surat->id }}" tabindex="-1" role="dialog"
                aria-labelledby="lampiranModalLabel{{ $surat->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lampiranModalLabel{{ $surat->id }}">Lihat
                                Lampiran
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($surat->lampiran)
                                <embed src="{{ asset('storage/' . $surat->lampiran) }}" type="application/pdf"
                                    width="100%" height="600px">
                            @else
                                <p>Lampiran tidak tersedia.</p>
                            @endif

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            </p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Daftar Barang
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Jenis Barang</th>
                            <th>Nama Barang</th>
                            <th>Uraian Masalah</th>
                            <th>Keterangan</th>
                            <th>Biaya</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat->barang as $barang)
                            @if ($barang->status === 'Disetujui Kepala Bidang')
                                <tr>
                                    <td>{{ $barang->jenis_barang }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->uraian_masalah }}</td>
                                    <td>{{ $barang->keterangan }}</td>
                                    <td>{{ 'Rp ' . number_format($barang->biaya, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($barang->gambar)
                                            <img src="{{ asset('assets/image/' . $barang->gambar) }}"
                                                alt="{{ $barang->nama_barang }}" style="max-width: 200px;">
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
