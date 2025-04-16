<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::with('nilaiAlternatifs')->get();

        // Hitung total bobot awal
        $totalBobot = $kriterias->sum('bobot_awal');
        // Hitung bobot normalisasi: bobot_awal / totalBobot
        $bobotNormal = [];
        foreach ($kriterias as $kriteria) {
            $bobotNormal[$kriteria->id] = $kriteria->bobot_awal / $totalBobot;
        }

        $results = [];
        // Perhitungan SMART: untuk setiap alternatif, jumlahkan (skor * bobot normalisasi) untuk semua kriteria
        foreach ($alternatifs as $alt) {
            $nilaiAkhir = 0;
            foreach ($alt->nilaiAlternatifs as $nilai) {
                $nilaiAkhir += $nilai->skor * ($bobotNormal[$nilai->kriteria_id] ?? 0);
            }
            $results[] = [
                'nama_alternatif' => $alt->nama_alternatif,
                'nilai_akhir'     => round($nilaiAkhir, 4),
            ];
        }

        // Urutkan hasil berdasarkan nilai_akhir menurun (nilai lebih tinggi lebih baik)
        usort($results, function ($a, $b) {
            return $b['nilai_akhir'] <=> $a['nilai_akhir'];
        });

        return view('hasil.index', compact('results'));
    }
}
