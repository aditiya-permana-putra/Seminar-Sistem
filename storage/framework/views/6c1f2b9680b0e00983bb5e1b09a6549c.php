

<?php $__env->startSection('title', 'Detail Surat'); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Surat</h1>
        <a href="<?php echo e(route('cetak-surat.index')); ?>" class="btn btn-primary">Kembali</a>
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
                <form action="<?php echo e(route('cetak-surat.cetak', $surat->id)); ?>" method="POST">
                    <!-- Menambahkan ID surat di sini -->
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Jenis Barang</th>
                                <th>Nama Barang</th>
                                <th>Uraian Masalah</th>
                                <th>Keterangan</th>
                                <th>Biaya</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $surat->barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($barang->jenis_barang); ?></td>
                                    <td><?php echo e($barang->nama_barang); ?></td>
                                    <td><?php echo e($barang->uraian_masalah); ?></td>
                                    <td><?php echo e($barang->keterangan); ?></td>
                                    <td><?php echo e($barang->biaya); ?></td>
                                    <td>
                                        <input type="checkbox" name="barang[]" value="<?php echo e($barang->id); ?>">
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary float-right">Cetak</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[action="<?php echo e(route('cetak-surat.cetak', $surat->id)); ?>"]');
            const checkboxes = document.querySelectorAll('input[name="barang[]"]');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                let checked = false;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        checked = true;
                    }
                });

                if (checked) {
                    form.submit();
                } else {
                    alert('Pilih setidaknya satu barang untuk dicetak.');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang\resources\views/pages/cetak-surat/show.blade.php ENDPATH**/ ?>