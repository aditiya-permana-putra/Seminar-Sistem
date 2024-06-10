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
                    @if ($surat->status === 'Selesai Di Proses Manager Klinik' || $surat->status === 'Sedang Di Proses Kepala Bidang')
                        <tr>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->user->name }}</td>
                            <td>{{ $surat->tanggal }}</td>
                            <td>{{ $surat->lokasi }}</td>
                            <td>{{ $surat->status }}</td>
                            <td>
                                @can('approve-kepala-bidang')
                                    <!-- Button untuk membuka modal unggah lampiran -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#uploadPdfModal{{ $surat->id }}">
                                        File Lampiran
                                    </button>
                                    <!-- Modal unggah lampiran -->
                                    <div class="modal fade" id="uploadPdfModal{{ $surat->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="uploadPdfModalLabel{{ $surat->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="uploadPdfModalLabel{{ $surat->id }}">Unggah
                                                        Lampiran</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('upload-pdf', $surat->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="lampiran">Pilih File PDF</label>
                                                            <input type="file" class="form-control-file" id="lampiran"
                                                                name="lampiran" required accept=".pdf">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Unggah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button untuk membuka modal lampiran -->
                                    <button type="button" class="btn btn-link" data-toggle="modal"
                                        data-target="#lampiranModal{{ $surat->id }}">
                                        <i class="fas fa-eye"></i> <!-- Icon mata -->
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
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($surat->lampiran)
                                                        <embed src="{{ asset('storage/' . $surat->lampiran) }}"
                                                            type="application/pdf" width="100%" height="600px">
                                                    @else
                                                        <p>Lampiran tidak tersedia.</p>
                                                    @endif

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('proses-kabid.show', $surat->id) }}"
                                        class="btn btn-info btn-sm">Lihat</a>
                                    @if ($surat->status === 'Sedang Di Proses Kepala Bidang')
                                        <button type="button" class="btn btn-success btn-sm"
                                            onclick="event.preventDefault(); document.getElementById('update-form-{{ $surat->id }}').submit();">Selesai
                                            Proses</button>
                                        <form id="update-form-{{ $surat->id }}"
                                            action="{{ route('proses-kabid.update', $surat->id) }}" method="POST"
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
