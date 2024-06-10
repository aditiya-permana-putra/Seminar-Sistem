

<?php $__env->startSection('title', 'Roles'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Roles</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Role</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('roles.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name">Role:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Role">
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-dark btn-sm">Kembali</a>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MAGANG FIX\Pengadaan-barang\resources\views/pages/management-access/role/edit.blade.php ENDPATH**/ ?>