
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('assets/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('assets/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('assets/js/sb-admin-2.min.js')); ?>"></script>

    <!-- Page level plugins -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <!-- Page level plugins -->
    <script src="<?php echo e(asset('assets/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    
    
    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('assets/js/demo/datatables-demo.js')); ?>"></script>

    
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if(Session::has('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?php echo e(Session::get('success')); ?>',
                showConfirmButton: false,
                timer: 1500
            });
        <?php endif; ?>
    });
</script>

    <script>
        function deletePermission(id) {
            // Tampilkan SweetAlert konfirmasi
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + id).submit();
                }
            });
        }
    </script>

<script>
    // Fungsi untuk menangani logout
    function handleLogout() {
        // Tampilkan konfirmasi menggunakan SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin ingin keluar?',
            text: 'Anda akan keluar dari akun ini',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Temukan form logout dan kirimkan form
                document.getElementById('logoutForm').submit();
            }
        });
    }
</script>
<?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang FIX\resources\views/includes/script.blade.php ENDPATH**/ ?>