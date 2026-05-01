<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard — Owner',
        ];
        return view('owner/dashboard', $data);
    }
}