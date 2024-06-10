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
                                <a href="{{ route('cetak-surat.show', $surat->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            @endcan
                            @can('cetak-surat')
                                <form action="{{ route('buat-surat.destroy', $surat->id) }}" method="post"
                                    style="display:inline-block;" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endcan

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        function confirmDelete() {
            if (confirm("Apakah Anda yakin ingin menghapus surat ini?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>

@endsection
