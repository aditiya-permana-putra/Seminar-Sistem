

<?php $__env->startSection('title', 'Permintaan Unit'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Permintaan</div>

                <div class="card-body">
                    <p><strong>Nomor Surat:</strong> <?php echo e($nomorSurat->nomor_surat); ?></p>
                    <p><strong>Tanggal:</strong> <?php echo e($nomorSurat->tanggal); ?></p>
                    <p><strong>Unit:</strong> <?php echo e($nomorSurat->unit->nama); ?></p>
                    <p><strong>Kategori:</strong> <?php echo e($nomorSurat->kategori ? $nomorSurat->kategori->nama : '-'); ?></p>
                    <hr>
                    <h4>Barang-barang:</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->nama_barang); ?></td>
                                <td><?php echo e($item->satuan); ?></td>
                                <td><?php echo e($item->stok); ?></td>
                                <td><?php echo e($item->jumlah); ?></td>
                                <td><?php echo e($item->keterangan); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MAGANG FIX\Pengadaan-barang\resources\views/pages/permintaan/show.blade.php ENDPATH**/ ?>