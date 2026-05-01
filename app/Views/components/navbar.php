<?php
$role = session()->get('role');
$nama = session()->get('nama');

$roleBadge = match($role) {
    'owner'         => ['label' => 'Owner',         'class' => 'bg-danger'],
    'kepala_cabang' => ['label' => 'Kepala Cabang',  'class' => 'bg-warning text-dark'],
    'kasir'         => ['label' => 'Kasir',          'class' => 'bg-success'],
    'operator'      => ['label' => 'Operator',       'class' => 'bg-info text-dark'],
    default         => ['label' => $role,            'class' => 'bg-secondary'],
};
?>

<!-- Kiri: Live Clock -->
<div class="d-flex align-items-center gap-2 text-muted small">
    <i class="bi bi-clock"></i>
    <span id="liveClock" class="fw-semibold text-dark"></span>
    <span class="text-muted">|</span>
    <span id="liveDate"></span>
</div>

<!-- Kanan: User Info + Logout -->
<div class="d-flex align-items-center gap-3">
    <div class="text-end d-none d-md-block">
        <div class="fw-semibold small lh-1"><?= esc($nama) ?></div>
        <span class="badge role-badge <?= $roleBadge['class'] ?> mt-1">
            <?= $roleBadge['label'] ?>
        </span>
    </div>
    <div class="dropdown">
        <button class="btn btn-light btn-sm rounded-circle p-2" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle fs-5"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
            <li>
                <span class="dropdown-item-text small text-muted">
                    Login sebagai <strong><?= esc($nama) ?></strong>
                </span>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item text-danger" href="/logout">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    function updateClock() {
        const now  = new Date();

        // Jam
        const jam  = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        // Tanggal lengkap
        const tgl  = now.toLocaleDateString('id-ID', {
            weekday: 'long', day: 'numeric', month: 'long', year: 'numeric'
        });

        document.getElementById('liveClock').textContent = jam;
        document.getElementById('liveDate').textContent  = tgl;
    }

    updateClock();
    setInterval(updateClock, 1000);
</script>