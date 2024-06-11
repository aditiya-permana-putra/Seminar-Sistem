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
                    @if ($surat->status === 'Pending' || $surat->status === 'Sedang Di Proses Manager Klinik')
                        <tr>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->user->name }}</td>
                            <td>{{ $surat->tanggal }}</td>
                            <td>{{ $surat->lokasi }}</td>
                            <td>{{ $surat->status }}</td>
                            <td>
                                @can('approve-manager-klinik')
                                    <a href="{{ route('pengajuan-surat.show', $surat->id) }}"
                                        class="btn btn-info btn-sm">Lihat</a>
                                    @if ($surat->status === 'Sedang Di Proses Manager Klinik' || $surat->status === 'Pending')
                                        <button type="button" class="btn btn-success btn-sm"
                                            onclick="event.preventDefault(); document.getElementById('update-form-{{ $surat->id }}').submit();">Selesai
                                            Proses</button>
                                        <form id="update-form-{{ $surat->id }}"
                                            action="{{ route('pengajuan-surat.update', $surat->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
