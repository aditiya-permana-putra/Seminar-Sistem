<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(route('dashboard.index')); ?>">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">BACKOFFICE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('dashboard.index')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('management-access')): ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Management Access</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo e(route('users.index')); ?>">Users</a>
                    <a class="collapse-item" href="<?php echo e(route('roles.index')); ?>">Roles</a>
                    <a class="collapse-item" href="<?php echo e(route('permissions.index')); ?>">Permissions</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cetak-surat')): ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
                aria-expanded="true" aria-controls="collapseTwo1">
                <i class="fas fa-fw fa-file"></i>
                <span>Cetak Surat</span>
            </a>
            <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo e(route('cetak-surat.index')); ?>">Surat Pengajuan</a>
                    <a class="collapse-item" href="<?php echo e(route('disposisi.index')); ?>">Disposisi</a>
                </div>
            </div>
        </li>
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permintaan')): ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('buat-surat.index')); ?>" aria-expanded="true">
                <i class="fas fa-fw fa-check"></i>
                <span>Buat Surat</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('riwayat-surat.index')); ?>" aria-expanded="true">
                <i class="fas fa-fw fa-briefcase"></i>
                <span>Riwayat Surat</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('unit.index')); ?>" aria-expanded="true">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve-manager-klinik')): ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('pengajuan-surat.index')); ?>" aria-expanded="true">
                <i class="fas fa-fw fa-file"></i>
                <span>Lihat Pengajuan</span>
            </a>
        </li>
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve-kepala-bidang')): ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('proses-kabid.index')); ?>" aria-expanded="true">
                <i class="fas fa-fw fa-file"></i>
                <span>Lihat Pengajuan</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approve-manager-umum')): ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('proses-manager.index')); ?>" aria-expanded="true">
                <i class="fas fa-fw fa-file"></i>
                <span>Lihat Pengajuan</span>
            </a>
        </li>
    <?php endif; ?>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-5">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<?php /**PATH D:\.Sistem Cuti Karyawan\Sistem Pengajuan Kerusakan Barang\resources\views/partials/menu.blade.php ENDPATH**/ ?>