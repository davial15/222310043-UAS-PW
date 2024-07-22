<?php

namespace App\Http\Controllers;

use App\Models\Olahan;
use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OlahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $olahans = Olahan::with('sampah')->latest()->get();
        return view('Olahan.index', [
            'olahans' => $olahans //yang dikriim ke front End
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sampahs = Sampah::all();
        return view('Olahan.create', [
            'sampahs' => $sampahs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $olahan = $request->all();
        $gambar = $request->file('gambar');
        if ($gambar) {
            $fileName = time() . $gambar->getClientOriginalName();
            $gambar->storeAs('public/olahan', $fileName); //untuk menyimpan file gambar ke folder storage
            $olahan['gambar'] = $fileName;
        }
        Olahan::create($olahan);
        return redirect('/olahan');
        // setelah di masukan ke database langsung pindah ke index
    }

    /**
     * Display the specified resource.
     */
    public function show(Olahan $olahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $olahan = Olahan::where('id', $id)->first();
        $sampahs = Sampah::all();
        return view('Olahan.edit', [
            'olahan' => $olahan,
            'sampahs' => $sampahs
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $olahan = Olahan::where('id', $id)->firstOrFail();

        if ($request->hasFile('gambar')) {
            Storage::delete('public/olahan/' . $olahan->gambar);
            $fileName = time() . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('public/olahan', $fileName);
            $olahan->gambar = $fileName;
        }

        $olahan->fill($request->except(['gambar']));
        $olahan->save();

        return redirect('/olahan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $olahan = Olahan::where('id', $id)->get();
        Olahan::destroy($olahan);
        //untuk menghapus konten olaahan berdasarkan id

        return redirect('/olahan');
    }
}
