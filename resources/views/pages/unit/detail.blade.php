@extends('layouts.master')

@section('title', 'Users')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('karyawan.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name"
                        class="form-control  @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}"
                        placeholder="Masukkan Nama">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="emailuser">Email:</label>
                    <input type="text" name="emailuser" id="emailuser"
                        class="form-control  @error('emailuser') is-invalid @enderror"
                        value="{{ old('emailuser', $user->emailuser) }}" placeholder="Masukkan Email Pribadi">
                    @error('emailuser')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nomor Rekening:</label>
                    <input type="text" name="no_rek" id="no_rek"
                        class="form-control  @error('no_rek') is-invalid @enderror"
                        value="{{ old('no_rek', $user->no_rek) }}" placeholder="Masukkan Nomor Rekening">
                    @error('no_rek')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nama Sesuai Rekening:</label>
                    <input type="text" name="nama_rekening" id="nama_rekening"
                        class="form-control  @error('nama_rekening') is-invalid @enderror"
                        value="{{ old('nama_rekening', $user->nama_rekening) }}"
                        placeholder="Masukkan Nama Sesuai Rekening">
                    @error('nama_rekening')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Jabatan:</label>
                    <input type="text" name="jabatan" id="jabatan"
                        class="form-control  @error('jabatan') is-invalid @enderror"
                        value="{{ old('jabatan', $user->jabatan) }}" readonly placeholder="Masukkan Nama Role">
                    @error('jabatan')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Unit:</label>
                    <input type="text" name="divisi" id="divisi"
                        class="form-control  @error('divisi') is-invalid @enderror"
                        value="{{ old('divisi', $user->divisi) }}" readonly placeholder="Masukkan Nama Role">
                    @error('divisi')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Unit Kerja:</label>
                    <input type="text" name="unit_kerja" id="unit_kerja"
                        class="form-control  @error('unit_kerja') is-invalid @enderror"
                        value="{{ old('unit_kerja', $user->unit_kerja) }}" readonly placeholder="Masukkan Nama Role">
                    @error('unit_kerja')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="name">Nomor Karyawan:</label>
                    <input type="text" name="no_karyawan" id="no_karyawan"
                        class="form-control  @error('no_karyawan') is-invalid @enderror"
                        value="{{ old('no_karyawan', $user->no_karyawan) }}" readonly placeholder="Masukkan Nama Role">
                    @error('no_karyawan')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Status Karyawan:</label>
                    <input type="text" name="status" id="status"
                        class="form-control  @error('status') is-invalid @enderror"
                        value="{{ old('status', $user->status) }}" readonly placeholder="Masukkan Nama Role">
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="name">Nomor Kartu Keluarga:</label>
                    <input type="text" name="no_kk" id="no_kk"
                        class="form-control  @error('no_kk') is-invalid @enderror"
                        value="{{ old('no_kk', $user->no_kk) }}" placeholder="Masukkan Nomor Kartu Keluarga">
                    @error('no_kk')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Nomor Induk Keluarga:</label>
                    <input type="text" name="no_nik" id="no_nik"
                        class="form-control  @error('no_nik') is-invalid @enderror"
                        value="{{ old('no_nik', $user->no_nik) }}" placeholder="Masukkan Nomor Induk Keluarga">
                    @error('no_nik')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" @if (old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if (old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lulusan">Lulusan</label>
                    <select name="lulusan" id="lulusan" class="form-control @error('lulusan') is-invalid @enderror">
                        <option value="">Pilih Lulusan</option>
                        <option value="SMA" @if (old('lulusan', $user->lulusan) == 'SMA') selected @endif>SMA</option>
                        <option value="SMK" @if (old('lulusan', $user->lulusan) == 'SMK') selected @endif>SMK</option>
                        <option value="D3" @if (old('lulusan', $user->lulusan) == 'D3') selected @endif>D3</option>
                        <option value="D4" @if (old('lulusan', $user->lulusan) == 'D4') selected @endif>D4</option>
                        <option value="S1" @if (old('lulusan', $user->lulusan) == 'S1') selected @endif>S1</option>
                        <option value="S2" @if (old('lulusan', $user->lulusan) == 'S2') selected @endif>S2</option>
                        <option value="S3" @if (old('lulusan', $user->lulusan) == 'S3') selected @endif>S3</option>
                    </select>
                    @error('lulusan')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="name">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        class="form-control  @error('alamat') is-invalid @enderror"
                        value="{{ old('alamat', $user->alamat) }}" placeholder="Masukkan Alamat">
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        class="form-control  @error('tempat_lahir') is-invalid @enderror"
                        value="{{ old('tempat_lahir', $user->tempat_lahir) }}"
                        placeholder="Masukkan Tempat Tanggal Lahir">
                    @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        class="form-control  @error('tanggal_lahir') is-invalid @enderror"
                        value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}"
                        placeholder="Masukkan Tempat Tanggal Lahir">
                    @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror">
                        <option value="">Pilih Agama</option>
                        <option value="Islam" @if (old('agama', $user->agama) == 'Islam') selected @endif>Islam</option>
                        <option value="Kristen Protestan" @if (old('agama', $user->agama) == 'Kristen Protestan') selected @endif>Kristen
                            Protestan</option>
                        <option value="Katolik" @if (old('agama', $user->agama) == 'Katolik') selected @endif>Katolik</option>
                        <option value="Hindu" @if (old('agama', $user->agama) == 'Hindu') selected @endif>Hindu</option>
                        <option value="Buddha" @if (old('agama', $user->agama) == 'Buddha') selected @endif>Buddha</option>
                        <option value="Konghucu" @if (old('agama', $user->agama) == 'Konghucu') selected @endif>Konghucu</option>
                    </select>
                    @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="name">Nomor HP</label>
                    <input type="text" name="kontak" id="kontak"
                        class="form-control  @error('kontak') is-invalid @enderror"
                        value="{{ old('kontak', $user->kontak) }}" placeholder="Masukkan Kontak">
                    @error('kontak')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="control-label">Foto</label>
                    @if ($user->foto)
                        <img src="{{ asset('/storage/foto_user/' . $user->foto) }}" class="img-thumbnail d-block"
                            style="width: 10%; margin-top: 5px; margin-bottom: 5px;">
                    @else
                        <label class="badge badge-pill badge-danger">Belum Ada Foto</label>
                    @endif
                    <input name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror"
                        type="file" accept="image/*" onchange="preview('.tampil-foto', this.files[0], 300)">
                    <div>
                        <small class="text-muted">Maximum file size: 2 MB</small>
                    </div>
                    <input type="hidden" name="foto_lama" value="{{ $user->foto }}">
                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </form>
        </div>
    </div>

@endsection
