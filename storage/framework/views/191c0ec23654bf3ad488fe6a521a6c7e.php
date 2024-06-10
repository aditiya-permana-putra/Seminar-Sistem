<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-data')): ?>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Master Data</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo e(route('units.index')); ?>">Unit</a>
                    <a class="collapse-item" href="<?php echo e(route('kategori.index')); ?>">Kategori</a>
                </div>
            </div>
            </li>
        <?php endif; ?>


    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permintaan')): ?>      
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('permintaan.index')); ?>" 
            aria-expanded="true" >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Permintaan</span>
        </a> 
    </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('persetujuan')): ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('persetujuan.index')); ?>" 
            aria-expanded="true" >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Persetujuan</span>
        </a> 
    </li>
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cetak-form-permintaan')): ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo e(route('memo.index')); ?>" 
            aria-expanded="true" >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Cetak Surat</span>
        </a> 
    </li>
    <?php endif; ?>



   





    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul><?php /**PATH D:\MAGANG FIX\Pengadaan-barang\resources\views/partials/menu.blade.php ENDPATH**/ ?>