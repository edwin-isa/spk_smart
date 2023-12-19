<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $subKriteria = SubKriteria::all();
        return view('subkriteria.index', compact('subKriteria'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('subkriteria.create', compact('kriteria'));
    }

    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'kriteria_id' => 'required|integer|exists:kriteria,id',
            'nama_sub_kriteria' => 'required|string',
        ]);

        // Simpan data ke database
        SubKriteria::create($validatedData);

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('subkriteria.index')->with('success', 'Data berhasil disimpan!');
    }
}
