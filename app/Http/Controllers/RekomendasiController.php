<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PerhitunganController;
use App\Models\Penilaian;

class RekomendasiController extends Controller
{
    public function index()
    {
        // Instansiasi PerhitunganController dan panggil method index
        $perhitunganController = new PerhitunganController();
        $perhitunganResult = $perhitunganController->index();

        // Ambil nilaiUtilitasArray dari hasil perhitungan
        $nilaiUtilitasArray = $perhitunganResult['nilaiUtilitasArray'];
        $penilaian = $perhitunganResult['penilaian']; // Tambahkan baris ini

        // Ambil 5 besar dari peringkat
        $topFiveAlternatif = collect($nilaiUtilitasArray)->sortByDesc('total_final_value')->take(5)->toArray();

        $dataRekomendasi = [];

        foreach ($topFiveAlternatif as $alternatifId => $scoreData) {
            $penilaian = Penilaian::where('id_alternatif', $alternatifId)->get();

            $dataAlternatif = [
                'name_alternatif' => '',
                'nilai_kriteria' => []
            ];

            foreach ($penilaian as $nilai) {
                $dataAlternatif['name_alternatif'] = $nilai->alternatif->name_alternatif;
                $dataAlternatif['nilai_kriteria'][] = [
                    'kriteria' => $nilai->kriteria->name_kriteria,
                    'nilai' => $nilai->value
                ];
            }

            $dataRekomendasi[] = $dataAlternatif;
        }

        return view('rekomendasi.index', compact('dataRekomendasi', 'penilaian'));
    }

    public function getJumlahRekomendasi()
    {
        $perhitunganController = new PerhitunganController();
        $perhitunganResult = $perhitunganController->index();

        $nilaiUtilitasArray = $perhitunganResult['nilaiUtilitasArray'];
        $topFiveAlternatif = collect($nilaiUtilitasArray)->sortByDesc('total_final_value')->take(5)->toArray();

        return count($topFiveAlternatif);
    }
}