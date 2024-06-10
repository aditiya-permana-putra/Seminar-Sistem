

<?php $__env->startSection('title', 'Detail Surat'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat</h1>
        <a href="<?php echo e(route('proses-manager.index')); ?>" class="btn btn-primary">Kembali</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Detail Surat
        </div>
        <div class="card-body">
            <p><strong>Nomor Surat:</strong> <?php echo e($surat->nomor_surat); ?></p>
            <p><strong>Pengirim:</strong> <?php echo e($surat->user->name); ?></p>
            <p><strong>Tanggal:</strong> <?php echo e($surat->tanggal); ?></p>
            <p><strong>Lokasi:</strong> <?php echo e($surat->lokasi); ?></p>
            <p><strong>Status:</strong> <?php echo e($surat->status); ?></p>
            <p> <!-- Button untuk membuka modal lampiran -->
                <button type="button" class="btn btn-link" data-toggle="modal"
                    data-target="#lampiranModal<?php echo e($surat->id); ?>">
                    <i class="fas fa-eye"></i> Lihat Lampiran <!-- Icon mata -->
                </button>
                <!-- Modal lampiran -->
            <div class="modal fade" id="lampiranModal<?php echo e($surat->id); ?>" tabindex="-1" role="dialog"
                aria-labelledby="lampiranModalLabel<?php echo e($surat->id); ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lampiranModalLabel<?php echo e($surat->id); ?>">Lihat
                                Lampiran
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php if($surat->lampiran): ?>
                                <embed src="<?php echo e(asset('storage/' . $surat->lampiran)); ?>" type="application/pdf"
                                    width="100%" height="600px">
                            <?php else: ?>
                                <p>Lampiran tidak tersedia.</p>
                            <?php endif; ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            </p>
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
                            <th>Biaya</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $surat->barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($barang->status === 'Disetujui Kepala Bidang'): ?>
                                <tr>
                                    <td><?php echo e($barang->jenis_barang); ?></td>
                                    <td><?php echo e($barang->nama_barang); ?></td>
                                    <td><?php echo e($barang->uraian_masalah); ?></td>
                                    <td><?php echo e($barang->keterangan); ?></td>
                                    <td><?php echo e('Rp ' . number_format($barang->biaya, 0, ',', '.')); ?></td>
                                    <td>
                                        <?php if($barang->gambar): ?>
                                            <img src="<?php echo e(asset('assets/image/' . $barang->gambar)); ?>"
                                                alt="<?php echo e($barang->nama_barang); ?>" style="max-width: 200px;">
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang\resources\views/pages/proses-manager/show.blade.php ENDPATH**/ ?>