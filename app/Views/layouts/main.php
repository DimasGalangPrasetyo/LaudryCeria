<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Laundry Ceria' ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 250px;
            --navbar-height: 56px;
            --primary: #0d6efd;
        }

        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', sans-serif;
        }

        /* ── Sidebar ── */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #1a1f2e 0%, #252b3b 100%);
            z-index: 1040;
            transition: transform 0.3s ease;
            overflow-y: auto;
            overflow-x: hidden;
        }

        #sidebar .brand {
            height: var(--navbar-height);
            display: flex;
            align-items: center;
            padding: 0 20px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        #sidebar .brand span {
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 0.3px;
        }

        #sidebar .brand i {
            color: #0d6efd;
            font-size: 1.5rem;
            margin-right: 10px;
        }

        #sidebar .nav-label {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.35);
            padding: 16px 20px 6px;
        }

        #sidebar .nav-link {
            color: rgba(255,255,255,0.65);
            padding: 10px 20px;
            border-radius: 8px;
            margin: 2px 10px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s;
            text-decoration: none;
        }

        #sidebar .nav-link:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        #sidebar .nav-link.active {
            background: #0d6efd;
            color: #fff;
            font-weight: 600;
        }

        #sidebar .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* ── Navbar ── */
        #navbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--navbar-height);
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            z-index: 1030;
            display: flex;
            align-items: center;
            padding: 0 20px;
            justify-content: space-between;
            transition: left 0.3s ease;
        }

        /* ── Main Content ── */
        #main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--navbar-height);
            padding: 24px;
            min-height: calc(100vh - var(--navbar-height));
            transition: margin-left 0.3s ease;
        }

        /* ── Sidebar Toggle (mobile) ── */
        #sidebar.collapsed {
            transform: translateX(-100%);
        }

        #navbar.expanded,
        #main-content.expanded {
            left: 0;
            margin-left: 0;
        }

        /* ── Badge role ── */
        .role-badge {
            font-size: 0.7rem;
            padding: 3px 8px;
            border-radius: 20px;
            font-weight: 600;
            text-transform: capitalize;
        }

        @media (max-width: 768px) {
            #sidebar { transform: translateX(-100%); }
            #navbar { left: 0; }
            #main-content { margin-left: 0; }

            #sidebar.show { transform: translateX(0); }
        }
    </style>
</head>
<body>

<!-- ══════════════ SIDEBAR ══════════════ -->
<div id="sidebar">
    <div class="brand">
        <i class="bi bi-basket2-fill"></i>
        <span>Laundry Ceria</span>
    </div>
    <?= view('components/sidebar') ?>
</div>

<!-- ══════════════ NAVBAR ══════════════ -->
<div id="navbar">
    <!-- Tombol toggle sidebar -->
    <button class="btn btn-sm btn-light" id="sidebarToggle">
        <i class="bi bi-list fs-5"></i>
    </button>

    <?= view('components/navbar') ?>
</div>

<!-- ══════════════ MAIN CONTENT ══════════════ -->
<div id="main-content">

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-1"></i>
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Page Content -->
    <?= $this->renderSection('content') ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle sidebar
    const sidebar      = document.getElementById('sidebar');
    const navbar       = document.getElementById('navbar');
    const mainContent  = document.getElementById('main-content');

    document.getElementById('sidebarToggle').addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        navbar.classList.toggle('expanded');
        mainContent.classList.toggle('expanded');

        // Mobile
        sidebar.classList.toggle('show');
    });
</script>

<?= $this->renderSection('scripts') ?>

</body>
</html>