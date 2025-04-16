<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriterias.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriterias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot_awal'    => 'required|numeric|min:1'
        ]);

        Kriteria::create($request->only('nama_kriteria', 'bobot_awal'));
        return redirect()->route('kriterias.index')
            ->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriterias.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot_awal'    => 'required|numeric|min:1'
        ]);

        $kriteria->update($request->only('nama_kriteria', 'bobot_awal'));
        return redirect()->route('kriterias.index')
            ->with('success', 'Kriteria berhasil diperbarui.');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriterias.index')
            ->with('success', 'Kriteria berhasil dihapus.');
    }
}
