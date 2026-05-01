# 🧺 Laundry Ceria

Sistem Manajemen Laundry berbasis web yang dibangun dengan **CodeIgniter 4**, **PHP 8.2**, **MySQL**, dan **Bootstrap 5 (CDN)**.

---

## 📋 Deskripsi

**Laundry Ceria** adalah aplikasi web manajemen laundry multi-cabang dengan sistem role-based access control (RBAC). Aplikasi ini dirancang untuk memudahkan pengelolaan operasional laundry dari level owner hingga operator lapangan.

---

## 👥 Role Pengguna

| Role | Deskripsi |
|------|-----------|
| **Owner** | Memantau pendapatan semua cabang, manajemen akun, cabang, dan layanan |
| **Kepala Cabang** | Memantau pendapatan cabang, absensi kasir & operator |
| **Kasir** | Melayani transaksi pelanggan dengan kasir pintar, cetak struk |
| **Operator** | Memantau pendapatan cabang, update status order |

---

## ✨ Fitur Utama

- 📊 **Dashboard Pintar** — Tampilan jam, tanggal, bulan, dan tahun secara real-time
- 💰 **Kasir Pintar** — Kalkulasi otomatis total harga dan kembalian
- 🏢 **Multi-Cabang** — Penempatan karyawan per cabang dengan session terikat cabang
- 📈 **Laporan Visual** — Line chart (data order) & Bar chart (pendapatan) per cabang
- 🔐 **RBAC** — Sistem login dengan hak akses berbeda tiap role
- 🧾 **Cetak Struk** — Struk transaksi untuk pelanggan
- 📅 **Absensi** — Pencatatan kehadiran kasir & operator oleh kepala cabang

---

## 🛠️ Tech Stack

| Komponen | Teknologi |
|----------|-----------|
| Backend Framework | CodeIgniter 4 |
| Language | PHP 8.2.12 |
| Database | MySQL |
| Frontend | HTML, Bootstrap 5 (CDN), JavaScript |
| Package Manager | Composer |
| Version Control | Git & GitHub |

---

## 🚀 Cara Instalasi

### Prasyarat
- PHP >= 8.2
- Composer
- MySQL
- Web Server (Apache/Nginx) atau PHP Built-in Server

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/USERNAME/LaundryCeria.git
cd LaundryCeria
```

**2. Install dependencies**
```bash
composer install
```

**3. Konfigurasi environment**
```bash
cp env .env
```

Edit file `.env`:
```env
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = laundryceria
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.port = 3306
```

**4. Buat database**
```sql
CREATE DATABASE laundryceria CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

**5. Jalankan server**
```bash
php spark serve
```

Akses aplikasi di `http://localhost:8080`

---

## 📁 Struktur Folder

```
laundry-ceria/
├── app/
│   ├── Config/
│   ├── Controllers/
│   │   ├── Auth/
│   │   ├── Owner/
│   │   ├── KepalaController.php
│   │   ├── KasirController.php
│   │   └── OperatorController.php
│   ├── Models/
│   ├── Views/
│   │   ├── layouts/
│   │   ├── components/
│   │   ├── auth/
│   │   ├── owner/
│   │   ├── kepala_cabang/
│   │   ├── kasir/
│   │   └── operator/
│   └── Database/
│       └── Migrations/
├── public/
│   └── assets/
│       ├── css/
│       ├── js/
│       └── img/
├── .env
└── composer.json
```

---

## 🗺️ Roadmap Pengembangan

- [x] **Tahap 1** — Setup CI4 & Struktur Folder
- [ ] **Tahap 2** — Database Design & Migrasi
- [ ] **Tahap 3** — Autentikasi & Login Multi-Role + Session Cabang
- [ ] **Tahap 4** — Layout & Template (Sidebar, Navbar per Role)
- [ ] **Tahap 5** — Dashboard (Jam, Tanggal, Chart)
- [ ] **Tahap 6** — Manajemen Cabang, Akun & Layanan (Owner)
- [ ] **Tahap 7** — Kasir Pintar & Cetak Struk
- [ ] **Tahap 8** — Absensi (Kepala Cabang)
- [ ] **Tahap 9** — Manajemen Status Order (Operator)
- [ ] **Tahap 10** — Polish, Testing & Deployment

---

## 👨‍💻 Developer

Dikembangkan sebagai project portofolio mahasiswa Teknik Informatika.

---

## 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran dan portofolio.
