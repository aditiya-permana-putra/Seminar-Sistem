@extends('layouts.master')

@section('title', 'Detail Surat')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat</h1>
        <a href="{{ route('cetak-surat.index') }}" class="btn btn-primary">Kembali</a>
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
            <p><strong>Disposisi:</strong> {{ $surat->disposisi }}</p>

        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Daftar Barang
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('cetak-surat.cetak', $surat->id) }}" method="POST">
                    <!-- Menambahkan ID surat di sini -->
                    @csrf
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Jenis Barang</th>
                                <th>Nama Barang</th>
                                <th>Uraian Masalah</th>
                                <th>Keterangan</th>
                                <th>Biaya</th>
                                <th>Status</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat->barang as $barang)
                                @if ($barang->status !== 'Ditolak Manager Klinik')
                                    <tr>
                                        <td>{{ $barang->jenis_barang }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->uraian_masalah }}</td>
                                        <td>{{ $barang->keterangan }}</td>
                                        <td>{{ $barang->biaya }}</td>
                                        <td>{{ $barang->status }}</td>
                                        <td>
                                            <input type="checkbox" name="barang[]" value="{{ $barang->id }}">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary float-right">Cetak</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[action="{{ route('cetak-surat.cetak', $surat->id) }}"]');
            const checkboxes = document.querySelectorAll('input[name="barang[]"]');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                let checked = false;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        checked = true;
                    }
                });

                if (checked) {
                    form.submit();
                } else {
                    alert('Pilih setidaknya satu barang untuk dicetak.');
                }
            });
        });
    </script>
@endsection
