

<?php $__env->startSection('title', 'Memo Permintaan'); ?>

<?php $__env->startSection('content'); ?>

    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Memo Permintaan</h1>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $nomorSuratTerverifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($surat->nomor_surat); ?></td> 
                            <td><?php echo e($surat->tanggal); ?></td>
                            <td class="text-center">
                                <?php if($surat->manager_operational_approved == 'Terverifikasi oleh Manager Operational'): ?>
                                    <span class="badge badge-success"> <i class="fas fa-check"></i> Disetujui oleh Manager Operational</span>
                                    <?php else: ?>
                                        <span class="badge badge-dark"> <i class="fas fa-clock"></i> Pending</span>
                                    <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-success btn-sm"> <i class="fas fa-print"></i> Print </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MAGANG\Fix\resources\views/pages/memo-permintaan/index.blade.php ENDPATH**/ ?>