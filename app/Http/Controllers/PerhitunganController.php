<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\Kriteria;

class PerhitunganController extends Controller
{
    public function index()
    {
        $penilaian = Penilaian::all();
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        $nilaiUtilitasArray = [];
        $penilaianRecordArray = [];

        // Inisialisasi Cmax dan Cmin
        $Cmax = [];
        $Cmin = [];

        // Hitung jumlah bobot untuk setiap kriteria
        $jumlahBobot = [];
        foreach ($kriteria as $c) {
            $jumlahBobot[$c->id] = $penilaian->where('id_kriteria', $c->id)->sum('value');

            // Temukan nilai terbesar (Cmax) dan terkecil (Cmin) di kriteria ini
            $Cmax[$c->id] = $penilaian->where('id_kriteria', $c->id)->max('value');
            $Cmin[$c->id] = $penilaian->where('id_kriteria', $c->id)->min('value');
        }

        // Hitung normalisasi bobot dan nilai utilitas
        foreach ($alternatif as $a) {
            $nilai_akhir = 0; // Inisialisasi nilai akhir

            foreach ($kriteria as $v) {
                $penilaianRecord = $penilaian
                    ->where('id_kriteria', $v->id)
                    ->where('id_alternatif', $a->id)
                    ->first();

                // Simpan nilai penilaian ke dalam array untuk digunakan selanjutnya
                $penilaianRecordArray[$a->id][$v->id] = $penilaianRecord ? $penilaianRecord->value : 0;

                // Hitung normalisasi bobot
                $bobotKriteria = $v->bobot / 100;
                $normalisasiBobot = number_format($bobotKriteria, 2);

                // Hitung nilai utilitas
                $Cout = $penilaianRecordArray[$a->id][$v->id];

                // Hitung nilai Cmax dan Cmin sesuai dengan kriteria
                $CmaxKriteria = $Cmax[$v->id];
                $CminKriteria = $Cmin[$v->id];

                $denominator = ($CmaxKriteria - $CminKriteria) != 0 ? ($CmaxKriteria - $CminKriteria) : 1;

                if ($v->attribute == 'cost') {
                    $nilai_utilitas = ($CmaxKriteria - $Cout) / $denominator * 1;
                } elseif ($v->attribute == 'benefit') {
                    $nilai_utilitas = ($Cout - $CminKriteria) / $denominator * 1;
                }

                // Simpan nilai utilitas ke dalam array untuk digunakan selanjutnya
                $nilaiUtilitasArray[$a->id][$v->id] = number_format($nilai_utilitas, 2);

                // Tambahkan nilai akhir dengan mengalikan normalisasi bobot dan nilai utilitas kriteria
                $nilai_akhir += $normalisasiBobot * $nilaiUtilitasArray[$a->id][$v->id];
            }

            // Simpan nilai akhir ke dalam array untuk digunakan selanjutnya
            $nilaiUtilitasArray[$a->id]['akhir'] = number_format($nilai_akhir, 2);
        }
       // Calculate total final values for each alternative
        foreach ($alternatif as $a) {
            $totalFinalValue = array_sum($nilaiUtilitasArray[$a->id]);
            $nilaiUtilitasArray[$a->id]['total_final_value'] = number_format($totalFinalValue, 2);
        }

        // Proses perhitungan ranking berdasarkan total_final_value
        $sortedAlternatif = collect($nilaiUtilitasArray)->sortByDesc('total_final_value')->toArray();

        $ranking = 1;
        $prevScore = null;

        foreach ($sortedAlternatif as $alternatifId => $scoreData) {
            $currentScore = $scoreData['total_final_value'];

            if ($prevScore !== null && $currentScore != $prevScore) {
                $ranking++;
            }

            $nilaiUtilitasArray[$alternatifId]['ranking'] = $ranking;
            $prevScore = $currentScore;
        }


        return view('perhitungan.index', compact('penilaian', 'alternatif', 'kriteria', 'nilaiUtilitasArray', 'jumlahBobot', 'Cmax', 'Cmin'));
    }
}
