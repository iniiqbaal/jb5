<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;

use App\Models\Laptop;

class HomeController extends Controller
{
    public function index(): View
    {
        //get posts
        $laptops = Laptop::latest()->paginate(8);

        //render view with posts
        return view('laptops.home', compact('laptops'));
    }
    public function show(string $id): View
    {
        //get post by ID
        $laptop = Laptop::findOrFail($id);

        //render view with post
        return view('home.show', compact('laptop'));
    }
}
