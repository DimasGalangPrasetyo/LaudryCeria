<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Tampilkan halaman login
    public function login()
    {
        // Kalau sudah login, langsung redirect ke dashboard
        if (session()->get('isLoggedIn')) {
            return $this->redirectToDashboard(session()->get('role'));
        }

        return view('auth/login');
    }

    // Proses login
    public function processLogin()
    {
        $identity = $this->request->getPost('identity');
        $password = $this->request->getPost('password');

        // Validasi input
        if (!$identity || !$password) {
            return redirect()->back()->with('error', 'Username dan password wajib diisi.');
        }

        // Cari user
        $user = $this->userModel->findByUsernameOrEmail($identity);

        // Cek apakah user ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Akun tidak ditemukan.')->withInput();
        }

        // Cek password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.')->withInput();
        }

        // Cek status akun
        if ($user['status'] === 'suspend') {
            return redirect()->back()->with('error', 'Akun Anda disuspend. Hubungi Owner.');
        }

        // Cek penempatan cabang (khusus non-owner)
        if ($user['role'] !== 'owner' && empty($user['cabang_id'])) {
            return redirect()->back()->with('error', 'Akun Anda belum ditempatkan di cabang manapun.');
        }

        // Simpan session
        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'nama'       => $user['nama'],
            'username'   => $user['username'],
            'email'      => $user['email'],
            'role'       => $user['role'],
            'cabang_id'  => $user['cabang_id'],
        ]);

        return $this->redirectToDashboard($user['role']);
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Berhasil logout.');
    }

    // Helper redirect sesuai role
    private function redirectToDashboard(string $role)
    {
        return match($role) {
            'owner'         => redirect()->to('/owner/dashboard'),
            'kepala_cabang' => redirect()->to('/kepala/dashboard'),
            'kasir'         => redirect()->to('/kasir/dashboard'),
            'operator'      => redirect()->to('/operator/dashboard'),
            default         => redirect()->to('/login'),
        };
    }
}