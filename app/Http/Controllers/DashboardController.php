<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin() {
        return view('admin.dashboard');
    }

    public function dapur() {
        return view('dapur.dashboard');
    }

    public function pemilik() {
        return view('pemilik.dashboard');
    }
}
