    

    <?php $__env->startSection('title', 'Detail Permintaan'); ?>

    <?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-primary-800">Detail Permintaan</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Nomor Surat:</strong> <?php echo e($nomorSurat->nomor_surat); ?></p>
            <p><strong>Tanggal:</strong> <?php echo e($nomorSurat->tanggal); ?></p>
            <p><strong>Unit:</strong> <?php echo e($nomorSurat->unit->nama_unit); ?></p>
            <p><strong>Kategori:</strong> <?php echo e($nomorSurat->kategori ? $nomorSurat->kategori->nama_kategori : '-'); ?></p>
        </div>
    </div>

    <div class="card mt-4 ">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($item->nama_barang); ?></td>
                            <td><?php echo e($item->satuan); ?></td>
                            <td><?php echo e($item->stok); ?></td>
                            <td><?php echo e($item->jumlah); ?></td>
                            <td><?php echo e($item->keterangan); ?></td>
                            <td>
                                <?php if($item->status == 'Approved'): ?>
                                    <span class="badge badge-success">Approved</span>
                                <?php elseif($item->status == 'belum disetujui'): ?>
                                    <span class="badge badge-dark">Pending</span>
                                <?php elseif($item->status == 'Rejected'): ?>
                                    <span class="badge badge-danger">Rejected</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <!-- Form untuk approve -->
                                <form action="<?php echo e(route('approve_barang', ['id' => $item->id])); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <!-- Form untuk reject -->
                                <form action="<?php echo e(route('reject_barang', ['id' => $item->id])); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo e(route('permintaan.index')); ?>" class="btn btn-primary "> <i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MAGANG FIX\Pengadaan-barang\resources\views/pages/persetujuan/show.blade.php ENDPATH**/ ?>