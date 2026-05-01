<?php
$role       = session()->get('role');
$currentUri = service('uri')->getPath();

// Helper: cek apakah link aktif
function isActive(string $path): string {
    $current = service('uri')->getPath();
    return str_starts_with($current, $path) ? 'active' : '';
}
?>

<nav class="mt-2 pb-4">

    <?php if ($role === 'owner'): ?>
    <!-- ── OWNER ── -->
    <div class="nav-label">Utama</div>
    <a href="/owner/dashboard" class="nav-link <?= isActive('/owner/dashboard') ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <div class="nav-label">Manajemen</div>
    <a href="/owner/cabang" class="nav-link <?= isActive('/owner/cabang') ?>">
        <i class="bi bi-building"></i> Cabang
    </a>
    <a href="/owner/akun" class="nav-link <?= isActive('/owner/akun') ?>">
        <i class="bi bi-people"></i> Akun Karyawan
    </a>
    <a href="/owner/layanan" class="nav-link <?= isActive('/owner/layanan') ?>">
        <i class="bi bi-tags"></i> Layanan
    </a>

    <?php elseif ($role === 'kepala_cabang'): ?>
    <!-- ── KEPALA CABANG ── -->
    <div class="nav-label">Utama</div>
    <a href="/kepala/dashboard" class="nav-link <?= isActive('/kepala/dashboard') ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <div class="nav-label">SDM</div>
    <a href="/kepala/absensi" class="nav-link <?= isActive('/kepala/absensi') ?>">
        <i class="bi bi-calendar-check"></i> Absensi
    </a>
    <a href="/kepala/kehadiran" class="nav-link <?= isActive('/kepala/kehadiran') ?>">
        <i class="bi bi-clipboard-data"></i> Rekap Kehadiran
    </a>

    <?php elseif ($role === 'kasir'): ?>
    <!-- ── KASIR ── -->
    <div class="nav-label">Utama</div>
    <a href="/kasir/dashboard" class="nav-link <?= isActive('/kasir/dashboard') ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <div class="nav-label">Transaksi</div>
    <a href="/kasir/transaksi" class="nav-link <?= isActive('/kasir/transaksi') ?>">
        <i class="bi bi-cart-plus"></i> Transaksi Baru
    </a>
    <a href="/kasir/riwayat" class="nav-link <?= isActive('/kasir/riwayat') ?>">
        <i class="bi bi-clock-history"></i> Riwayat Order
    </a>

    <?php elseif ($role === 'operator'): ?>
    <!-- ── OPERATOR ── -->
    <div class="nav-label">Utama</div>
    <a href="/operator/dashboard" class="nav-link <?= isActive('/operator/dashboard') ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <div class="nav-label">Order</div>
    <a href="/operator/order" class="nav-link <?= isActive('/operator/order') ?>">
        <i class="bi bi-list-check"></i> Status Order
    </a>

    <?php endif; ?>

    <!-- ── Logout (semua role) ── -->
    <div class="nav-label">Akun</div>
    <a href="/logout" class="nav-link text-danger-emphasis">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

</nav>