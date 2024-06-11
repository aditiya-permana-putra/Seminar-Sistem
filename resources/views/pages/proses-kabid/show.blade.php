@extends('layouts.master')

@section('title', 'Detail Surat')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat</h1>
        <a href="{{ route('proses-kabid.index') }}" class="btn btn-primary">Kembali</a>
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
                            <th>Gambar</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat->barang as $barang)
                            @if ($barang->status === 'Disetujui Manager Klinik')
                                <tr>
                                    <td>{{ $barang->jenis_barang }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->uraian_masalah }}</td>
                                    <td>{{ $barang->keterangan }}</td>
                                    <td>
                                        @if ($barang->gambar)
                                            <img src="{{ asset('assets/image/' . $barang->gambar) }}"
                                                alt="{{ $barang->nama_barang }}" style="max-width: 100px;">
                                        @endif
                                    </td>
                                    <td>{{ $barang->biaya }}</td>
                                    <td>
                                        @can('approve-kepala-bidang')
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#modal{{ $barang->id }}">
                                                Setujui
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal{{ $barang->id }}" tabindex="-1"
                                                aria-labelledby="modalLabel{{ $barang->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel{{ $barang->id }}">
                                                                Setujui Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('barang.approvekabid', $barang->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="status_manager">Alasan Setujui</label>
                                                                    <textarea class="form-control" id="status_manager" name="status_manager" rows="3" required></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="biaya">Biaya</label>
                                                                    <input type="number" class="form-control" id="biaya"
                                                                        name="biaya" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Setujui</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#exampleModal{{ $barang->id }}">
                                                Tolak
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $barang->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel{{ $barang->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel{{ $barang->id }}">
                                                                Tolak Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('barang.rejectkabid', $barang->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="status_manager">Alasan Penolakan</label>
                                                                    <textarea class="form-control" id="status_manager" name="status_manager" rows="3" required></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Tolak</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        @endcan
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
