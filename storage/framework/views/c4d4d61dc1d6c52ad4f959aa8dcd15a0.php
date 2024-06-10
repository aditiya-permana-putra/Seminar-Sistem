

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
                                            alt="<?php echo e($barang->nama_barang); ?>" style="max-width: 200px;">
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang\resources\views/pages/riwayat-surat/show.blade.php ENDPATH**/ ?>