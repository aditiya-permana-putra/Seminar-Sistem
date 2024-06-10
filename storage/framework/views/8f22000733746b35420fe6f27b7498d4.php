

<?php $__env->startSection('title', 'Kategori'); ?>

<?php $__env->startSection('content'); ?>
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        <a href="<?php echo e(route('kategoriw.create')); ?>" class="btn btn-success btn-sm">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th>Kategori</th>
                        <th class="text-center" width="40%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->nama_kategori); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('kategori.edit', $item->id)); ?>" class="btn btn-outline-primary btn-sm mr-2"> Edit </a>

                               <!-- Tambahkan tombol delete -->
                               <button class="btn btn-outline-danger btn-sm " onclick="deletePermission(<?php echo e($item->id); ?>)">Delete</button>
                                
                               <form id="deleteForm<?php echo e($item->id); ?>" action="<?php echo e(route('kategori.destroy', $item->id)); ?>" method="POST" style="display: inline;">
                                   <?php echo csrf_field(); ?>
                                   <?php echo method_field('DELETE'); ?>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Fix\resources\views/pages/master-data/kategori/index.blade.php ENDPATH**/ ?>