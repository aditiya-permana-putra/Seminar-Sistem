

<?php $__env->startSection('title', 'Riwayat Surat'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Surat</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Diposisi Manager Operasional & Umum</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $suratList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($surat->user_id === auth()->id()): ?>
                        <tr>
                            <td><?php echo e($surat->nomor_surat); ?></td>
                            <td><?php echo e($surat->tanggal); ?></td>
                            <td><?php echo e($surat->lokasi); ?></td>
                            <td><?php echo e($surat->status); ?></td>
                            <td><?php echo e($surat->disposisi); ?></td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('detail-permintaan')): ?>
                                    <a href="<?php echo e(route('riwayat-surat.show', $surat->id)); ?>" class="btn btn-info btn-sm">Lihat</a>
                                <?php endif; ?>
                                
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang FIX\resources\views/pages/riwayat-surat/index.blade.php ENDPATH**/ ?>