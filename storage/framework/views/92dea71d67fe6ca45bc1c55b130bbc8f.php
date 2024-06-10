

<?php $__env->startSection('title', 'Units'); ?>

<?php $__env->startSection('content'); ?>
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Units</h1>
</div>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('table-permintaan')): ?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Units</h6>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah-permintaan')): ?>
            <a href="<?php echo e(route('permintaan.create')); ?>" class="btn btn-success btn-sm"> <i class="fas fa-plus"></i> Tambah Data</a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th class="text-center" width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $nomorsurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($surat->nomor_surat); ?></td>
                            <td><?php echo e($surat->tanggal); ?></td>
                            <td class="text-center">
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('detail-permintaan')): ?>
                                    <a href="#" class="btn btn-info btn-sm" data-target="#detailModal-<?php echo e($surat->id); ?>" data-toggle="modal"><i class="fas fa-eye"></i> Lihat </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ubah-permintaan')): ?>
                                    <a href="<?php echo e(route('permintaan.edit', $surat->id)); ?>" class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i> Edit</a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus-permintaan')): ?>    
                                    <form action="<?php echo e(route('permintaan.destroy', $surat->id)); ?>" method="POST" style="display: inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"> <i class="fas fa-trash"></i> Delete</button>
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
<?php endif; ?>

<?php $__currentLoopData = $nomorsurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Modal untuk detail data permintaan -->
    <div class="modal fade" id="detailModal-<?php echo e($surat->id); ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Permintaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $surat->barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->nama_barang); ?></td>
                                    <td><?php echo e($item->satuan); ?></td>
                                    <td><?php echo e($item->stok); ?></td>
                                    <td><?php echo e($item->jumlah); ?></td>
                                    <td><?php echo e($item->status); ?></td>
                                </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MAGANG FIX\Pengadaan-barang\resources\views/pages/permintaan/index.blade.php ENDPATH**/ ?>