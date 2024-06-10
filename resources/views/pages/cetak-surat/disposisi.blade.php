@extends('layouts.master')

@section('title', 'Riwayat Surat')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Surat</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Pengirim</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suratList as $surat)
                    <tr>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->user->name }}</td>
                        <td>{{ $surat->tanggal }}</td>
                        <td>{{ $surat->lokasi }}</td>
                        <td>{{ $surat->status }}</td>
                        <td>
                            @can('cetak-surat')
                                <form action="{{ route('cetak-surat.cetakdisposisi', $surat->id) }}" method="POST">
                                    @csrf <!-- Tambahkan ini -->
                                    <button type="submit" class="btn btn-primary btn-sm">Cetak</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
