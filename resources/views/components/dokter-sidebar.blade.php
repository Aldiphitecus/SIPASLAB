<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Beranda</div>
            <a class="text nav-link {{ $isActive == 'dashboard' ? 'active bg-success' : '' }}" href="/dokter/">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                Menu Utama
            </a>
            <div class="sb-sidenav-menu-heading">Pemeriksaan</div>
            <a class="text nav-link {{ $isActive == 'pemeriksaan' ? 'active bg-success' : '' }}"
                href="/dokter/pemeriksaan/semuadata">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Semua Pemeriksaan
            </a>
            <a class="text nav-link {{ $isActive == 'pemeriksaanAnda' ? 'active bg-success' : '' }}"
                href="/dokter/pemeriksaan/semuadata2">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Pemeriksaan Anda
            </a>
            <div class="sb-sidenav-menu-heading">Dokter</div>
            <a class="text nav-link {{ $isActive == 'dokter' ? 'active bg-success' : '' }}"
                href="/dokter/dokter/semuadokter">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-doctor"></i></div>
                Data Dokter
            </a>
            <a class="text nav-link {{ $isActive == 'pengajuan' ? 'active bg-success' : '' }}"
                href="/dokter/pengajuan/pengajuan-dokter">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-doctor"></i></div>
                Pengajuan Dokter
            </a>
        </div>
    </div>
</nav>
