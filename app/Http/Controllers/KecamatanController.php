<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::all();
        return view('index_kecamatan', compact('kecamatans'));
    }

    public function create()
    {
        return view('create_kecamatan');
    }

    public function edit(Kecamatan $kecamatan)
    {
        return view('edit_kecamatan', compact('kecamatan'));
    }
}
