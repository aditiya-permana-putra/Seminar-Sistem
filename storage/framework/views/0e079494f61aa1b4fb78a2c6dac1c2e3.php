

<?php $__env->startSection('title', 'Buat Surat'); ?>

<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('table-permintaan')): ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buat Surat</h1>
        </div>

        <form id="mainForm" action="<?php echo e(route('buat-surat.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-row">
                <div class="form-group col-12 col-md-4">
                    <label for="nomor_surat">Nomor Surat:</label>
                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="lokasi">Lokasi:</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="-" required>
                </div>
            </div>
            <h5 class="mt-4">Daftar Barang</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="barangTable">
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
                        <!-- Rows will be added here by JavaScript -->
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-success mt-3" onclick="addRow()">Tambah Data</button>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    <?php endif; ?>



    <script>
        function addRow() {
            const table = document.getElementById("barangTable").getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();
            const rowCount = table.rows.length;

            const jenisBarangCell = newRow.insertCell(0);
            const namaBarangCell = newRow.insertCell(1);
            const uraianMasalahCell = newRow.insertCell(2);
            const keteranganCell = newRow.insertCell(3);
            const gambarCell = newRow.insertCell(4);
            const aksiCell = newRow.insertCell(5);

            jenisBarangCell.innerHTML = '<input type="text" class="form-control" name="jenis_barang[]" value="-" required>';
            namaBarangCell.innerHTML = '<input type="text" class="form-control" name="nama_barang[]" required>';
            uraianMasalahCell.innerHTML = '<input type="text" class="form-control" name="uraian_masalah[]" required>';
            keteranganCell.innerHTML = '<input type="text" class="form-control" name="keterangan[]" required>';
            gambarCell.innerHTML = '<input type="file" name="gambar[]" class="form-control">';
            aksiCell.innerHTML = '<button type="button" class="btn btn-danger" onclick="deleteRow(this)">-</button>';
        }

        function deleteRow(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang FIX\resources\views/pages/buat-surat/index.blade.php ENDPATH**/ ?>