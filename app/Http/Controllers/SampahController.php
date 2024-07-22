<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sampahs = Sampah::all();
        return view('Sampah.index', [
            'sampahs' => $sampahs //yang dikriim ke front End
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sampah = $request->all();
        $gambar = $request->file('gambar');
        if ($gambar) {
            $fileName = time() . $gambar->getClientOriginalName();
            $gambar->storeAs('public/sampah', $fileName); //untuk menyimpan file gambar ke folder storage
            $sampah['gambar'] = $fileName;
        }
        Sampah::create($sampah);
        return redirect('/sampah');
        // setelah di masukan ke database langsung pindah ke index
    }

    /**
     * Display the specified resource.
     */
    public function show(Sampah $sampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sampah = Sampah::where('id', $id)->first();
        return view('Sampah.edit', [
            'sampah' => $sampah
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $sampah = Sampah::where('id', $id)->firstOrFail();

        if ($request->hasFile('gambar')) {
            Storage::delete('public/sampah/' . $sampah->gambar);
            $fileName = time() . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('public/sampah', $fileName);
            $sampah->gambar = $fileName;
        }

        $sampah->fill($request->except(['gambar']));
        $sampah->save();

        return redirect('/sampah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sampah = Sampah::where('id', $id)->get(); // untuk mengambil salah satu nilai
        Sampah::destroy($sampah);
        //untuk menghapus konten sampah berdasarkan id

        return redirect('/sampah');
    }
}
