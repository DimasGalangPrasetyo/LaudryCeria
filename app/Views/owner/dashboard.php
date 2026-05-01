<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Dashboard</h4>
        <p class="text-muted small mb-0">Selamat datang, <?= esc(session()->get('nama')) ?>!</p>
    </div>
</div>

<div class="alert alert-info">
    <i class="bi bi-info-circle me-1"></i>
    Dashboard owner akan dilengkapi di tahap berikutnya (chart, statistik, dll).
</div>

<?= $this->endSection() ?>