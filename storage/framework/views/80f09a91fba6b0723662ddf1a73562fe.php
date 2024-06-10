<?php
    use Carbon\Carbon;
?>



<?php $__env->startSection('title', 'Daftar Permintaan Units'); ?>


<?php $__env->startSection('content'); ?>
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Permintaan Units</h1>
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
                        <th class="text-center" width="23%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $nomorSuratTerverifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($surat->nomor_surat); ?></td>
                            <td><?php echo e(Carbon::parse($surat->tanggal)->format('d F Y')); ?></td>
                            <td class="text-center">
                                <?php if($surat->manager_operational_approved == 'Terverifikasi oleh Manager Operational'): ?>
                                    <span class="badge badge-success"> <i class="fas fa-check"></i> Terverfikasi</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger"> <i class="fas fa-clock"></i> Pending</span>
                                    <?php endif; ?>

                            </td>
                            <td class="text-center">
                                <a href="<?php echo e(route('manager-operational.show', $surat->id)); ?>" class="btn btn-info btn-sm"> <i class="fas fa-eye"></i> Lihat Permintaan</a>
                               
                                <!-- Form untuk approve -->
                                <form action="<?php echo e(route('approve_surat_operational', ['id' => $surat->id])); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check"></i> Verifikasi</button>
                                </form>


                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MAGANG\Fix\resources\views/pages/manager-operational/index.blade.php ENDPATH**/ ?>