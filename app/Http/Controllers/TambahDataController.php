<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;

use App\Models\Laptop;

class TambahDataController extends Controller
{
    public function tambah(): View
    {
        return view('laptops.create');
    }
}
