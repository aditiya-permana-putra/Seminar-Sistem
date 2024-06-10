

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
                    <?php if($surat->status === 'Selesai Di Proses Kepala Bidang'): ?>
                        <tr>
                            <td><?php echo e($surat->nomor_surat); ?></td>
                            <td><?php echo e($surat->user->name); ?></td>
                            <td><?php echo e($surat->tanggal); ?></td>
                            <td><?php echo e($surat->lokasi); ?></td>
                            <td><?php echo e($surat->status); ?></td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve-manager-umum')): ?>
                                    <a href="<?php echo e(route('proses-manager.show', $surat->id)); ?>" class="btn btn-info btn-sm">Lihat</a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#disposisiModal<?php echo e($surat->id); ?>">
                                        Disposisi
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="disposisiModal<?php echo e($surat->id); ?>" tabindex="-1"
                                        aria-labelledby="disposisiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="disposisiModalLabel">Disposisi Surat</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('disposisi-surat', $surat->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="form-group row">
                                                            <!-- Checkbox di sebelah kiri -->
                                                            <div class="col-md-6">
                                                                <label for="checkbox1">
                                                                    <input type="checkbox" id="checkbox1" name="pilihan[]"
                                                                        value="Diselesaikan">
                                                                    Diselesaikan
                                                                </label><br>
                                                                <label for="checkbox2">
                                                                    <input type="checkbox" id="checkbox2" name="pilihan[]"
                                                                        value="Dilaksanakan">
                                                                    Dilaksanakan
                                                                </label><br>
                                                                <label for="checkbox3">
                                                                    <input type="checkbox" id="checkbox3" name="pilihan[]"
                                                                        value="Proses Sesuai Ketentuan">
                                                                    Proses Sesuai Ketentuan
                                                                </label><br>
                                                                <label for="checkbox4">
                                                                    <input type="checkbox" id="checkbox4" name="pilihan[]"
                                                                        value="Disposisi Diedarkan">
                                                                    Disposisi Diedarkan
                                                                </label><br>
                                                                <label for="checkbox5">
                                                                    <input type="checkbox" id="checkbox5" name="pilihan[]"
                                                                        value="Diikuti Perkembangan">
                                                                    Diikuti Perkembangan
                                                                </label><br>
                                                                <label for="checkbox6">
                                                                    <input type="checkbox" id="checkbox6" name="pilihan[]"
                                                                        value="Bicara Dengan Saya">
                                                                    Bicara Dengan Saya
                                                                </label><br>
                                                                <label for="checkbox7">
                                                                    <input type="checkbox" id="checkbox7" name="pilihan[]"
                                                                        value="Diketahui">
                                                                    Diketahui
                                                                </label><br>
                                                                <!-- Tambahkan checkbox tambahan di sini -->
                                                            </div>
                                                            <!-- Checkbox di sebelah kanan -->
                                                            <div class="col-md-6">
                                                                <label for="checkbox8">
                                                                    <input type="checkbox" id="checkbox8" name="pilihan[]"
                                                                        value="Setuju Ditindaklanjuti">
                                                                    Setuju Ditindaklanjuti
                                                                </label><br>
                                                                <label for="checkbox9">
                                                                    <input type="checkbox" id="checkbox9" name="pilihan[]"
                                                                        value="Ditelaah/Dipelajari">
                                                                    Ditelaah/Dipelajari
                                                                </label><br>
                                                                <label for="checkbox10">
                                                                    <input type="checkbox" id="checkbox10" name="pilihan[]"
                                                                        value="Dipersiapkan">
                                                                    Dipersiapkan
                                                                </label><br>
                                                                <label for="checkbox11">
                                                                    <input type="checkbox" id="checkbox11" name="pilihan[]"
                                                                        value="Diteliti/Dijawab Segera">
                                                                    Diteliti/Dijawab Segera
                                                                </label><br>
                                                                <label for="checkbox12">
                                                                    <input type="checkbox" id="checkbox12" name="pilihan[]"
                                                                        value="Saran/Tanggapan">
                                                                    Saran/Tanggapan
                                                                </label><br>
                                                                <label for="checkbox13">
                                                                    <input type="checkbox" id="checkbox13" name="pilihan[]"
                                                                        value="Diteruskan">
                                                                    Diteruskan
                                                                </label><br>
                                                                <label for="checkbox14">
                                                                    <input type="checkbox" id="checkbox14" name="pilihan[]"
                                                                        value="Arsip">
                                                                    Arsip
                                                                </label><br>
                                                                <!-- Tambahkan checkbox tambahan di sini -->
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Keterangan:</label>
                                                            <textarea class="form-control" id="status" name="status" rows="3"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Disposisi</button>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang FIX\resources\views/pages/proses-manager/index.blade.php ENDPATH**/ ?>