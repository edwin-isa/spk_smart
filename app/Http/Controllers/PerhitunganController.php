<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PerhitunganController extends Controller
{
    //
    public function assessmentsFilled()
    {
        // Check if assessments are filled (adjust this based on your data structure)
        $assessments = Penilaian::all(); // Replace it with your actual assessment model
        // if ($assessments->count() < 2) {
        //     return false;
        // }

        return $assessments->isNotEmpty();
    }
    public function index(){

        if (!$this->assessmentsFilled()) {
            Alert::error('Failed', 'Isi Matriks Penilaian terlebih dahulu');

            // Redirect back or to a specific page with a message
            return redirect()->route('penilaian.index')->with('error', 'Please fill out the assessments before viewing the ranking.');
        }

        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $penilaian = Penilaian::with(['alternatif', 'kriteria'])->get();

        $desiredDecimalPlaces = 2; // Ganti jumlah desimal

        // Inisialisasi variabel

        foreach ($kriteria as $k => $v) {
            foreach ($penilaian as $p => $val) {
                if ($v->id == $val->id_kriteria) {
                    $minMax[$v->id][] = $val->value;
                }
            }

            // Check if there are values for the current $kriteriaId
            if (!empty($minMax[$v->id])) {
                $values = $minMax[$v->id];
                $maxXi[$v->id] = max($values);
                $minXi[$v->id] = min($values);

                // Initialize $tij and $V for the current $kriteriaId
                $tij[$v->id] = [];
                $V[$v->id] = [];
                // Normalisasi
                foreach ($alternatif as $a) {
                    $penilaianRecord = $penilaian
                        ->where('id_kriteria', $v->id)
                        ->where('id_alternatif', $a->id)
                        ->first();

                    $bobotKriteria = $penilaianRecord ? $penilaianRecord->value : 0;
                    $jumlahBobotKriteria = $penilaian->where('id_kriteria', $v->id)->sum('value');
                    $nilaiNormalisasi = $jumlahBobotKriteria != 0 ? $bobotKriteria / $jumlahBobotKriteria : 0;

                    // Rumus normalisasi
                    if ($v->attribute == "benefit") {
                        $normalizedValue = ($maxXi[$v->id] - $minXi[$v->id]) != 0 ? ($nilaiNormalisasi - $minXi[$v->id]) / ($maxXi[$v->id] - $minXi[$v->id]) : 0;
                    } elseif ($v->attribute == "cost") {
                        $normalizedValue = ($maxXi[$v->id] - $minXi[$v->id]) != 0 ? ($maxXi[$v->id] - $nilaiNormalisasi) / ($maxXi[$v->id] - $minXi[$v->id]) : 0;
                    }

                    // Normalisasi
                    $tij[$v->id][$a->id] = number_format($normalizedValue, $desiredDecimalPlaces);
                }
            }
        }


        foreach ($kriteria as $v) {
            foreach ($alternatif as $a) {
                // Menghitung nilai kriteria maksimal dan minimal
                $Cmax = $penilaian->where('id_kriteria', $v->id)->max('value');
                $Cmin = $penilaian->where('id_kriteria', $v->id)->min('value');

                // Mengambil nilai kriteria untuk alternatif saat ini
                $penilaianRecord = $penilaian
                    ->where('id_kriteria', $v->id)
                    ->where('id_alternatif', $a->id)
                    ->first();

                // Menentukan nilai kriteria alternatif
                $Cout = $penilaianRecord ? $penilaianRecord->value : 0;

                // Inisialisasi nilai utilitas
                $nilai_utilitas = 0;

                // Logika penghitungan nilai utilitas
                if ($v->attribute == 'cost') {
                    // Rumus untuk atribut cost
                    $denominator = ($Cmax - $Cmin) != 0 ? ($Cmax - $Cmin) : "undefined";
                    $nilai_utilitas = $denominator != "undefined" ? ($Cmax - $Cout) / $denominator * 100 : 0;
                } elseif ($v->attribute == 'benefit') {
                    // Rumus untuk atribut benefit
                    $denominator = ($Cmax - $Cmin) != 0 ? ($Cmax - $Cmin) : "undefined";
                    $nilai_utilitas = $denominator != "undefined" ? ($Cout - $Cmin) / $denominator * 100 : 0;
                }


                // Anda dapat menyimpan nilai utilitas ke dalam array atau struktur data lainnya
                // atau menggunakan sesuai kebutuhan bisnis Anda.

                // Contoh menyimpan nilai utilitas ke dalam array
                $nilaiUtilitasArray[$a->id][$v->id] = $nilai_utilitas;
            }
        }

        foreach ($alternatif as $a) {
            $totalFinalValue = 0;

            foreach ($kriteria as $v) {
                // Menghitung nilai kriteria maksimal dan minimal
                $Cmax = $penilaian->where('id_kriteria', $v->id)->max('value');
                $Cmin = $penilaian->where('id_kriteria', $v->id)->min('value');

                // Mengambil nilai kriteria untuk alternatif saat ini
                $penilaianRecord = $penilaian
                    ->where('id_kriteria', $v->id)
                    ->where('id_alternatif', $a->id)
                    ->first();

                // Menentukan nilai kriteria alternatif
                $Cout = $penilaianRecord ? $penilaianRecord->value : 0;

                // Inisialisasi nilai utilitas
                $nilai_utilitas = 0;

                // Logika penghitungan nilai utilitas
                if ($v->attribute == 'cost') {
                    // Rumus untuk atribut cost
                    $denominator = ($Cmax - $Cmin) != 0 ? ($Cmax - $Cmin) : "undefined";
                    $nilai_utilitas = $denominator != "undefined" ? ($Cmax - $Cout) / $denominator * 100 : 0;
                } elseif ($v->attribute == 'benefit') {
                    // Rumus untuk atribut benefit
                    $denominator = ($Cmax - $Cmin) != 0 ? ($Cmax - $Cmin) : "undefined";
                    $nilai_utilitas = $denominator != "undefined" ? ($Cout - $Cmin) / $denominator * 100 : 0;
                }


                // Ambil nilai bobot dari penilaian
                $penilaianRecord = $penilaian
                    ->where('id_kriteria', $v->id)
                    ->where('id_alternatif', $a->id)
                    ->first();

                $bobotKriteria = $penilaianRecord ? $penilaianRecord->value : 0;
                $jumlahBobotKriteria = $penilaian->where('id_kriteria', $v->id)->sum('value');
                $nilaiNormalisasi = $jumlahBobotKriteria != 0 ? $bobotKriteria / $jumlahBobotKriteria : 0;

                // Hitung nilai akhir untuk kriteria saat ini
                $finalValue = $nilaiNormalisasi * $nilai_utilitas;

                // Tambahkan nilai akhir untuk kriteria saat ini ke total nilai akhir untuk alternatif
                $totalFinalValue += $finalValue;
            }

            // Tambahkan total nilai akhir untuk alternatif saat ini ke dalam array
            $totalFinalValues[$a->id] = $totalFinalValue;
        }



        // Perankingan
        foreach($alternatif as $alt){
            $total = 0;
            foreach($kriteria as $kri){
                $key = $alt->id - 1;
                // Check if the key exists in the $Q array
                if (isset($Q[$kri->id][$key])) {
                    $total += $Q[$kri->id][$key];
                } else {
                    // Provide a default value if the key is not set
                    // You can adjust this default value based on your logic
                    $total += 0;
                }
            }

            $rank[$alt->id] = number_format($total, $desiredDecimalPlaces);
        }
        arsort($rank);

        // dd($V, $G,$Q, $rank);

        // Kirim data ke view
        return view('perhitungan.index', [
            'normalisasi' => $tij,
            'kriteria' => $kriteria,
            'alternatif' => $alternatif,
            'penilaian' => $penilaian,
            'pembobotan' => $V,
            'ranking' => $rank,
            'nilaiUtilitasArray' => $nilaiUtilitasArray,
        ]);
    }



}
