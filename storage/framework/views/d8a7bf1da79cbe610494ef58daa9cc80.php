

<?php $__env->startSection('title', 'Lihat Surat'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lihat Surat</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Jenis Barang</th>
                    <th>Nama Barang</th>
                    <th>Uraian Masalah</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $suratList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $surat->barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($surat->nomor_surat); ?></td>
                            <td><?php echo e($surat->tanggal); ?></td>
                            <td><?php echo e($surat->lokasi); ?></td>
                            <td><?php echo e($barang->jenis_barang); ?></td>
                            <td><?php echo e($barang->nama_barang); ?></td>
                            <td><?php echo e($barang->uraian_masalah); ?></td>
                            <td><?php echo e($barang->keterangan); ?></td>
                            <td>
                                <?php if($barang->gambar): ?>
                                    <img src="<?php echo e(asset('assets/image/' . $barang->gambar)); ?>" alt="<?php echo e($barang->nama_barang); ?>"
                                        style="max-width: 100px;">
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang\resources\views/pages/lihat-surat/index.blade.php ENDPATH**/ ?>