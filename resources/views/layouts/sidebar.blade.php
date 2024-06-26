<style>
    .sidebar {
        position: relative;
    }
</style>

<div class="sidebar"> <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search"> <input class="form-control form-control-sidebar"
                type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append"> <button class="btn btn-sidebar"> <i class="fas fa-search fa-fw"></i>
                </button> </div>
        </div>
    </div> <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} "> <i
                        class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Peminjaman</li>
            <li class="nav-item"> <a href="{{ url('/pinjam') }}"
                    class="nav-link {{ $activeMenu == 'stok' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>Data Peminjaman</p>
                </a> </li>
            <li class="nav-item">
                <a href="{{ url('/riwayat') }}" class="nav-link {{ $activeMenu == 'riwayat' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-history"></i>
                    <p>Riwayat Peminjaman</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item"> <a href="{{ url('/level') }}"
                    class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }} "> <i
                        class="nav-icon fas fa-layer-group"></i>
                    <p>Level User</p>
                </a> </li>
            <li class="nav-item"> <a href="{{ url('/user') }}"
                    class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}"> <i class="nav-icon far fa-user"></i>
                    <p>Data User</p>
                </a> </li>
            <li class="nav-header">Data Sarana Prasarana</li>
            <li class="nav-item"> <a href="{{ url('/barang') }}"
                    class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }} "> <i
                        class="nav-icon far fa-list-alt"></i>
                    <p>Data Barang</p>
                </a> </li>
            <li class="nav-item"> <a href="{{ url('/ruangan') }}"
                    class="nav-link {{ $activeMenu == 'ruangan' ? 'active' : '' }} "> <i
                        class="nav-icon far fa-list-alt"></i>
                    <p>Data Ruangan</p>
                </a> </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button class="nav-link {{ $activeMenu == 'keluar' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Keluar</p>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>
