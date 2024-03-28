<?php

namespace App\Http\Controllers;

use App\Models\Laptop;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class LaptopController extends Controller
{
    public function index(): View
    {
        $laptops = Laptop::latest()->paginate(5);

        return view('laptops.index', compact('laptops'));
    }

    public function create(): View
    {
        return view('laptops.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // buat validasi form
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,avif|max:2048',
            'nama_produk' => 'required|min:5',
            'harga' => 'required|min:5',
            'deskripsi' => 'required|min:5'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/laptops', $image->hashName());

        //create post
        Laptop::create([
            'image'     => $image->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'deskripsi'   => $request->deskripsi
        ]);

        return redirect()->route('laptops.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $laptop = Laptop::findOrFail($id);

        return view('laptops.show', compact('laptop'));
    }

    public function edit(string $id): View
    {
        //get post by ID
        $laptop = Laptop::findOrFail($id);

        //render view with post
        return view('laptops.edit', compact('laptop'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk'     => 'required|min:5',
            'harga'     => 'required|min:5',
            'deskripsi'   => 'required|min:5'
        ]);

        //get post by ID
        $laptop = Laptop::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/laptops', $image->hashName());

            //delete old image
            Storage::delete('public/laptops/'.$laptop->image);

            //update post with new image
            $laptop->update([
                'image'     => $image->hashName(),
                'nama_produk'     => $request->nama_produk,
                'harga'     => $request->harga,
                'deskripsi'   => $request->deskripsi
            ]);

        } else {

            //update post without image
            $laptop->update([
                'nama_produk'     => $request->nama_produk,
                'harga'     => $request->harga,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('laptops.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $laptop = Laptop::findOrFail($id);

        // hapus gambar
        Storage::delete('public/laptops/'. $laptop->image);

        $laptop->delete();

        return redirect()->route('laptops.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function home(): View
    {
        //get posts
        $laptops = Laptop::latest()->paginate(8);

        //render view with posts
        return view('laptops.home', compact('laptops'));
    }
}
