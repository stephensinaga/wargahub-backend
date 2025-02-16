<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    public function Dashboard()
    {
        $reports = Report::latest()->take(10)->get(); // Ambil 10 laporan terbaru
        return view('admin.dashboard', compact('reports'));
    }
}
