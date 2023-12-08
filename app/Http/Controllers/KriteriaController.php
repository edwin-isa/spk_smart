<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(){
        $kriteria = Kriteria::all();
        return view("kriteria.index", compact("kriteria"));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.create');
    }

   public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'name_kriteria' => 'required|string',
            'attribute' => 'required|in:benefit,cost',
            'bobot' => 'required|numeric',
        ]);

        // Simpan data ke database
        Kriteria::create($validatedData);

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('kriteria.index')->with('success', 'Data berhasil disimpan!');
}


    public function edit(string $id){
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, string $id){
        $kriteria = Kriteria::find($id);

        $request -> validate([
            'name_kriteria' => 'required|string',
            'attribute'     => 'required|string',
            'bobot'         => 'required|numeric|min:0|max:100',
        ]);

        $kriteria->update($request->all());
        return redirect()->route('kriteria.index')
        ->with('success', 'Kriteria berhasil diupdate');
    }

    public function destroy(string $id){
        Kriteria::find($id)->delete();
        return redirect()->route('kriteria.index')
        ->with('success','Kriteria berhasil dihapus');
    }
}
