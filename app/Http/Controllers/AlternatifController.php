<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        // Mengambil alternatif beserta relasi nilai dan kriteria
        $alternatifs = Alternatif::with('nilaiAlternatifs.kriteria')->get();
        return view('alternatifs.index', compact('alternatifs'));
    }

    public function create()
    {
        // Ambil semua data kriteria agar form input skor muncul otomatis
        $kriterias = Kriteria::all();
        return view('alternatifs.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required'
        ]);

        $alternatif = Alternatif::create($request->only('nama_alternatif', 'deskripsi'));

        // Loop setiap input skor; data dikirim sebagai array score[kriteria_id] = nilai
        if ($request->has('score')) {
            foreach ($request->score as $kriteria_id => $nilai) {
                NilaiAlternatif::create([
                    'alternatif_id' => $alternatif->id,
                    'kriteria_id'   => $kriteria_id,
                    'skor'          => $nilai
                ]);
            }
        }
        return redirect()->route('alternatifs.index')
            ->with('success', 'Alternatif berhasil ditambahkan.');
    }

    public function edit(Alternatif $alternatif)
    {
        $kriterias = Kriteria::all();
        // Susun skor saat ini berdasarkan kriteria (key => nilai)
        $scores = [];
        foreach ($alternatif->nilaiAlternatifs as $nilai) {
            $scores[$nilai->kriteria_id] = $nilai->skor;
        }
        return view('alternatifs.edit', compact('alternatif', 'kriterias', 'scores'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'nama_alternatif' => 'required'
        ]);

        $alternatif->update($request->only('nama_alternatif', 'deskripsi'));

        // Update atau buat data skor baru untuk setiap kriteria
        foreach ($request->score as $kriteria_id => $nilai) {
            $alternatif->nilaiAlternatifs()->updateOrCreate(
                ['kriteria_id' => $kriteria_id],
                ['skor' => $nilai]
            );
        }

        return redirect()->route('alternatifs.index')
            ->with('success', 'Alternatif berhasil diperbarui.');
    }

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        return redirect()->route('alternatifs.index')
            ->with('success', 'Alternatif berhasil dihapus.');
    }
}
    