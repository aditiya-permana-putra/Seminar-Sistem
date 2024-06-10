@extends('layouts.master')

@section('title', 'Karyawan')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 20rem;">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('storage/foto_user/' . Auth::user()->foto) }}" class="card-img-top rounded-circle"
                    style="width: 150px; height: 150px; object-fit: cover;" alt="...">
            </div>
            <div class="card-body text-center">
                <h5 class="card-title">{{ Auth::user()->name }}</h5>
                <p class="card-text">

                <div>
                    @if (auth()->user()->ttd)
                        <img src="{{ auth()->user()->ttd }}" alt="User Signature"
                            style="max-width: 100px; max-height: 100px;">
                    @else
                        <p>Pengguna belum membuat tanda tangan.</p>
                    @endif
                </div>


                </p>

                <div class="d-flex justify-content-between">
                    {{-- <a href="{{ route('unit.show', ['unit' => Auth::user()->id]) }}" class="btn btn-primary">Edit
                        Profile</a> --}}

                    <form id="signatureForm" action="{{ route('signature.save') }}" method="POST">
                        @csrf
                        <input type="hidden" name="signature" id="signatureData">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-center" data-toggle="modal"
                            data-target="#exampleModal">
                            Tanda Tangan
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tanda Tangan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <canvas id="signatureCanvas" width="400" height="200"></canvas>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        var canvas = document.getElementById('signatureCanvas');
        var ctx = canvas.getContext('2d');
        var isDrawing = false;
        var lastX = 0;
        var lastY = 0;

        canvas.addEventListener('mousedown', function(e) {
            isDrawing = true;
            [lastX, lastY] = [e.offsetX, e.offsetY];
        });

        canvas.addEventListener('mousemove', function(e) {
            if (!isDrawing) return;
            ctx.beginPath();
            ctx.moveTo(lastX, lastY);
            ctx.lineTo(e.offsetX, e.offsetY);
            ctx.strokeStyle = '#000';
            ctx.lineWidth = 8;
            ctx.stroke();
            [lastX, lastY] = [e.offsetX, e.offsetY];
        });

        canvas.addEventListener('mouseup', function() {
            isDrawing = false;
        });

        // Submit form to save signature
        document.getElementById('signatureForm').addEventListener('submit', function(event) {
            // Save signature data to hidden input
            document.getElementById('signatureData').value = canvas.toDataURL();
        });
    </script>
@endsection
