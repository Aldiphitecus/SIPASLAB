<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Beranda</div>
            <a class="text nav-link {{ $isActive == 'dashboard' ? 'active bg-success' : '' }}" href="/admin/">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                Menu Utama
            </a>
            <div class="sb-sidenav-menu-heading">Pemeriksaan</div>
            <a class="text nav-link {{ $isActive == 'pemeriksaan' ? 'active bg-success' : '' }}"
                href="/admin/pemeriksaan/semuadata">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Data Pemeriksaan
            </a>
            <a class="text nav-link {{ $isActive == 'pasien' ? 'active bg-success' : '' }}"
                href="/admin/pasien/semuadata">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-bed-pulse"></i></div>
                Data Pasien
            </a>
            <a class="text nav-link {{ $isActive == 'jenistes' ? 'active bg-success' : '' }}"
                href="/admin/jenistes/semuadata">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                Jenis Tes
            </a>
            <div class="sb-sidenav-menu-heading">Dokter</div>
            <a class="text nav-link {{ $isActive == 'dokter' ? 'active bg-success' : '' }}"
                href="/admin/dokter/semuadokter">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-doctor"></i></div>
                Data Dokter
            </a>
            <a class="text nav-link {{ $isActive == 'pengajuanDokter' ? 'active bg-success' : '' }}"
                href="/admin/pengajuan/semuapengajuan">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-doctor"></i></div>
                Pengajuan Dokter
            </a>
            <div class="sb-sidenav-menu-heading">Poli</div>
            <a class="text nav-link {{ $isActive == 'poli' ? 'active bg-success' : '' }}" href="/admin/poli/semuadata">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-hospital"></i></div>
                Data Poli
            </a>
        </div>
    </div>
</nav>
