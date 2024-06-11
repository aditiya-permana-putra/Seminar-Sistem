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
            <p><strong>Disposisi:</strong> {{ $surat->disposisi }}</p>
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
                            <th>Aksi</th>
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
                                            alt="{{ $barang->nama_barang }}" style="max-width: 100px;">
                                    @endif
                                </td>
                                <td>
                                    @if (
                                        $barang->status !== 'Disetujui Manager Klinik' &&
                                            $barang->status !== 'Ditolak Manager Klinik' &&
                                            $barang->status !== 'Disetujui Kepala Bidang' &&
                                            $barang->status !== 'Ditolak Kepala Bidang' &&
                                            $barang->status !== 'Sudah Disposisi Manager')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#modal{{ $barang->id }}">
                                            Edit
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{ $barang->id }}" tabindex="-1"
                                            aria-labelledby="modalLabel{{ $barang->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel{{ $barang->id }}">
                                                            Edit Barang</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('barang.update', $barang->id) }} "
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="jenis_barang">Jenis Barang</label>
                                                                <input type="text" class="form-control" id="jenis_barang"
                                                                    name="jenis_barang"
                                                                    value="{{ $barang->jenis_barang }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_barang">Nama Barang</label>
                                                                <input type="text" class="form-control" id="nama_barang"
                                                                    name="nama_barang" value="{{ $barang->nama_barang }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="uraian_masalah">Uraian Masalah</label>
                                                                <input type="text" class="form-control"
                                                                    id="uraian_masalah" name="uraian_masalah"
                                                                    value="{{ $barang->uraian_masalah }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="keterangan">Keterangan</label>
                                                                <input type="text" class="form-control" id="keterangan"
                                                                    name="keterangan" value="{{ $barang->keterangan }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gambar">Foto</label>
                                                                <input type="file" class="form-control" id="gambar"
                                                                    name="gambar">
                                                            </div>
                                                            <button type="submit" class="btn btn-success btn-sm">Simpan
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('barang.destroybarang', $barang->id) }}" method="post"
                                            style="display:inline-block;" onsubmit="return confirmDelete();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            if (confirm("Apakah Anda yakin ingin menghapus Barang ini?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection
