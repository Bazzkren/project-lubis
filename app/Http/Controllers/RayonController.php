<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $rayons = Rayon::all();

    return view('rayons.index', compact('rayons'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): RedirectResponse
    {
        return redirect()->route('rayons.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_rayon' => 'required',
        ]);

        Rayon::create($validated);

        return redirect()->route('rayons.index')
            ->with('success', 'Rayon berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        return view('rayons.show', compact('rayon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rayon $rayon)
    {
        return view('rayons.edit', compact('rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rayon $rayon)
    {
        $request->validate([
            'nama_rayon' => 'required',
        ]);

        $rayon->update($request->all());

        return redirect()->route('rayons.index')
            ->with('success', 'Rayon berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();

        return redirect()->route('rayons.index')
            ->with('success', 'Rayon berhasil dihapus!');
    }
}
