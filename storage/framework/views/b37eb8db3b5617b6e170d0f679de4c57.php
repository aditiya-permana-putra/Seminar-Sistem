

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
                    <th>Pengirim</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $suratList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($surat->status === 'Selesai Di Proses Manager Klinik' || $surat->status === 'Sedang Di Proses Kepala Bidang'): ?>
                        <tr>
                            <td><?php echo e($surat->nomor_surat); ?></td>
                            <td><?php echo e($surat->user->name); ?></td>
                            <td><?php echo e($surat->tanggal); ?></td>
                            <td><?php echo e($surat->lokasi); ?></td>
                            <td><?php echo e($surat->status); ?></td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve-kepala-bidang')): ?>
                                    <!-- Button untuk membuka modal unggah lampiran -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#uploadPdfModal<?php echo e($surat->id); ?>">
                                        File Lampiran
                                    </button>
                                    <!-- Modal unggah lampiran -->
                                    <div class="modal fade" id="uploadPdfModal<?php echo e($surat->id); ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="uploadPdfModalLabel<?php echo e($surat->id); ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="uploadPdfModalLabel<?php echo e($surat->id); ?>">Unggah
                                                        Lampiran</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo e(route('upload-pdf', $surat->id)); ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="lampiran">Pilih File PDF</label>
                                                            <input type="file" class="form-control-file" id="lampiran"
                                                                name="lampiran" required accept=".pdf">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Unggah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button untuk membuka modal lampiran -->
                                    <button type="button" class="btn btn-link" data-toggle="modal"
                                        data-target="#lampiranModal<?php echo e($surat->id); ?>">
                                        <i class="fas fa-eye"></i> <!-- Icon mata -->
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
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if($surat->lampiran): ?>
                                                        <embed src="<?php echo e(asset('storage/' . $surat->lampiran)); ?>"
                                                            type="application/pdf" width="100%" height="600px">
                                                    <?php else: ?>
                                                        <p>Lampiran tidak tersedia.</p>
                                                    <?php endif; ?>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="<?php echo e(route('proses-kabid.show', $surat->id)); ?>"
                                        class="btn btn-info btn-sm">Lihat</a>
                                    <?php if($surat->status === 'Sedang Di Proses Kepala Bidang'): ?>
                                        <button type="button" class="btn btn-success btn-sm"
                                            onclick="event.preventDefault(); document.getElementById('update-form-<?php echo e($surat->id); ?>').submit();">Selesai
                                            Proses</button>
                                        <form id="update-form-<?php echo e($surat->id); ?>"
                                            action="<?php echo e(route('proses-kabid.update', $surat->id)); ?>" method="POST"
                                            style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang\resources\views/pages/proses-kabid/index.blade.php ENDPATH**/ ?>