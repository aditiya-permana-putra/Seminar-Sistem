@extends('layouts.master')

@section('title', 'Dashboard')


@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="text-muted">Tata Cara Penggunaan Sistem</h6>
                    <ol>
                        <li>Unit Masing-masing bisa mengisi pada menu buat surat dan bisa melihat surat yang disetujui.</li>
                        <li>Manager Klinik bisa mensetujui surat yang diajukan unit.</li>
                        <li>Kepala Bidang akan memproses surat yang disetuji Kepala Klinik.</li>
                        <li>Manager akan mendisposisi surat yang sudah di proses Kepala Bidang.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
