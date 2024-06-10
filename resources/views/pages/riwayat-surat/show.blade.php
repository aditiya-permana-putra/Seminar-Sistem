@extends('layouts.master')

@section('title', 'Detail Surat')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat</h1>
        <a href="{{ route('riwayat-surat.index') }}" class="btn btn-primary">Kembali</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Detail Surat
        </div>
        <div class="card-body">
            <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
            <p><strong>Tanggal:</strong> {{ $surat->tanggal }}</p>
            <p><strong>Lokasi:</strong> {{ $surat->lokasi }}</p>
            <p><strong>Status:</strong> {{ $surat->status }}</p>
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
                            <th>Estimasi Biaya</th>
                            <th>Status</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat->barang as $barang)
                            <tr>
                                <td>{{ $barang->jenis_barang }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->uraian_masalah }}</td>
                                <td>{{ $barang->keterangan }}</td>
                                <td>{{ $barang->biaya }}</td>
                                <td>{{ $barang->status }},{{ $barang->status_manager }}
                                </td>
                                <td>
                                    @if ($barang->gambar)
                                        <img src="{{ asset('assets/image/' . $barang->gambar) }}"
                                            alt="{{ $barang->nama_barang }}" style="max-width: 200px;">
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
