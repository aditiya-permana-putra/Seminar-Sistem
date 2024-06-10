<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">BACKOFFICE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    @can('management-access')
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Management Access</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
                    <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
                    <a class="collapse-item" href="{{ route('permissions.index') }}">Permissions</a>
                </div>
            </div>
        </li>
    @endcan

    @can('cetak-surat')
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
                aria-expanded="true" aria-controls="collapseTwo1">
                <i class="fas fa-fw fa-file"></i>
                <span>Cetak Surat</span>
            </a>
            <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('cetak-surat.index') }}">Surat Pengajuan</a>
                    <a class="collapse-item" href="{{ route('disposisi.index') }}">Disposisi</a>
                </div>
            </div>
        </li>
    @endcan


    @can('permintaan')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('buat-surat.index') }}" aria-expanded="true">
                <i class="fas fa-fw fa-check"></i>
                <span>Buat Surat</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('riwayat-surat.index') }}" aria-expanded="true">
                <i class="fas fa-fw fa-briefcase"></i>
                <span>Riwayat Surat</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('unit.index') }}" aria-expanded="true">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
        </li>
    @endcan

    @can('approve-manager-klinik')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('pengajuan-surat.index') }}" aria-expanded="true">
                <i class="fas fa-fw fa-file"></i>
                <span>Lihat Pengajuan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('unit.index') }}" aria-expanded="true">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
        </li>
    @endcan


    @can('approve-kepala-bidang')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('proses-kabid.index') }}" aria-expanded="true">
                <i class="fas fa-fw fa-file"></i>
                <span>Lihat Pengajuan</span>
            </a>
        </li>
    @endcan

    @can('approve-manager-umum')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('proses-manager.index') }}" aria-expanded="true">
                <i class="fas fa-fw fa-file"></i>
                <span>Lihat Pengajuan</span>
            </a>
        </li>
    @endcan


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-5">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
