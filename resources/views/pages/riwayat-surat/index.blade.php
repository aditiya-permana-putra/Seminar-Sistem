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
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Diposisi Manager Operasional & Umum</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suratList as $surat)
                    @if ($surat->user_id === auth()->id())
                        <tr>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->tanggal }}</td>
                            <td>{{ $surat->lokasi }}</td>
                            <td>{{ $surat->status }}</td>
                            <td>{{ $surat->disposisi }}</td>
                            <td>
                                @can('detail-permintaan')
                                    <a href="{{ route('riwayat-surat.show', $surat->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                @endcan
                                {{-- @can('hapus-permintaan')
                                <form action="{{ route('buat-surat.destroy', $surat->id) }}" method="post"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endcan --}}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
