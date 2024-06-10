

<?php $__env->startSection('title', 'Detail Surat'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat</h1>
        <a href="<?php echo e(route('proses-kabid.index')); ?>" class="btn btn-primary">Kembali</a>
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
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $surat->barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($barang->status === 'Disetujui Manager Klinik'): ?>
                                <tr>
                                    <td><?php echo e($barang->jenis_barang); ?></td>
                                    <td><?php echo e($barang->nama_barang); ?></td>
                                    <td><?php echo e($barang->uraian_masalah); ?></td>
                                    <td><?php echo e($barang->keterangan); ?></td>
                                    <td>
                                        <?php if($barang->gambar): ?>
                                            <img src="<?php echo e(asset('assets/image/' . $barang->gambar)); ?>"
                                                alt="<?php echo e($barang->nama_barang); ?>" style="max-width: 200px;">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve-kepala-bidang')): ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#modal<?php echo e($barang->id); ?>">
                                                Setujui
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal<?php echo e($barang->id); ?>" tabindex="-1"
                                                aria-labelledby="modalLabel<?php echo e($barang->id); ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel<?php echo e($barang->id); ?>">
                                                                Setujui Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo e(route('barang.approvekabid', $barang->id)); ?>"
                                                                method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="form-group">
                                                                    <label for="status_manager">Alasan Setujui</label>
                                                                    <textarea class="form-control" id="status_manager" name="status_manager" rows="3" required></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="biaya">Biaya</label>
                                                                    <input type="number" class="form-control" id="biaya"
                                                                        name="biaya" required>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Setujui</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang FIX\resources\views/pages/proses-kabid/show.blade.php ENDPATH**/ ?>