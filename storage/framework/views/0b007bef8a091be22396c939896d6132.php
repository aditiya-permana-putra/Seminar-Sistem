

<?php $__env->startSection('title', 'Detail Surat'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat</h1>
        <a href="<?php echo e(route('riwayat-surat.index')); ?>" class="btn btn-primary">Kembali</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Detail Surat
        </div>
        <div class="card-body">
            <p><strong>Nomor Surat:</strong> <?php echo e($surat->nomor_surat); ?></p>
            <p><strong>Tanggal:</strong> <?php echo e($surat->tanggal); ?></p>
            <p><strong>Lokasi:</strong> <?php echo e($surat->lokasi); ?></p>
            <p><strong>Status:</strong> <?php echo e($surat->status); ?></p>
            <p><strong>Disposisi:</strong> <?php echo e($surat->disposisi); ?></p>
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
                        <?php $__currentLoopData = $surat->barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($barang->jenis_barang); ?></td>
                                <td><?php echo e($barang->nama_barang); ?></td>
                                <td><?php echo e($barang->uraian_masalah); ?></td>
                                <td><?php echo e($barang->keterangan); ?></td>
                                <td><?php echo e($barang->biaya); ?></td>
                                <td><?php echo e($barang->status); ?>,<?php echo e($barang->status_manager); ?>

                                </td>
                                <td>
                                    <?php if($barang->gambar): ?>
                                        <img src="<?php echo e(asset('assets/image/' . $barang->gambar)); ?>"
                                            alt="<?php echo e($barang->nama_barang); ?>" style="max-width: 100px;">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(
                                        $barang->status !== 'Disetujui Manager Klinik' &&
                                            $barang->status !== 'Ditolak Manager Klinik' &&
                                            $barang->status !== 'Disetujui Kepala Bidang' &&
                                            $barang->status !== 'Ditolak Kepala Bidang' &&
                                            $barang->status !== 'Sudah Disposisi Manager'): ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#modal<?php echo e($barang->id); ?>">
                                            Edit
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal<?php echo e($barang->id); ?>" tabindex="-1"
                                            aria-labelledby="modalLabel<?php echo e($barang->id); ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel<?php echo e($barang->id); ?>">
                                                            Edit Barang</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('barang.update', $barang->id)); ?> "
                                                            method="POST" enctype="multipart/form-data">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PUT'); ?>
                                                            <div class="form-group">
                                                                <label for="jenis_barang">Jenis Barang</label>
                                                                <input type="text" class="form-control" id="jenis_barang"
                                                                    name="jenis_barang"
                                                                    value="<?php echo e($barang->jenis_barang); ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_barang">Nama Barang</label>
                                                                <input type="text" class="form-control" id="nama_barang"
                                                                    name="nama_barang" value="<?php echo e($barang->nama_barang); ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="uraian_masalah">Uraian Masalah</label>
                                                                <input type="text" class="form-control"
                                                                    id="uraian_masalah" name="uraian_masalah"
                                                                    value="<?php echo e($barang->uraian_masalah); ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="keterangan">Keterangan</label>
                                                                <input type="text" class="form-control" id="keterangan"
                                                                    name="keterangan" value="<?php echo e($barang->keterangan); ?>">
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
                                        <form action="<?php echo e(route('barang.destroybarang', $barang->id)); ?>" method="post"
                                            style="display:inline-block;" onsubmit="return confirmDelete();">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang FIX\resources\views/pages/riwayat-surat/show.blade.php ENDPATH**/ ?>