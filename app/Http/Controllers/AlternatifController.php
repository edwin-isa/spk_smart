<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        return view("alternatif.index", compact("alternatif"));
    }
    public function create()
    {
        $alternatif= Alternatif::all();
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name_alternatif" => "required|string",
            "nis" => "required|string",
            "alamat" => "required|string",
            "jeniskelamin" => "required|string",
            "tanggallahir" => "required|date",
        ]);

        $alternatif = Alternatif::create($request->all());

        return redirect()->route("alternatif.index")
            ->with("success", "Alternatif berhasil diperbaharui");
    }

    public function edit(Alternatif $alternatif)
    {
        return view("alternatif.edit", compact("alternatif"));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            "name_alternatif" => "required|string",
            "nis" => "required|string",
            "alamat" => "required|string",
            "jeniskelamin" => "required|string",
            "tanggallahir" => "required|date",
        ]);

        $alternatif->update($request->all());

        return redirect()->route("alternatif.index");
    }

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->penilaian()->delete();
        $alternatif->delete();
        return redirect()->route("alternatif.index")->with("success", "Alternatif berhasil dihapus beserta penilaiannya");
    }
}
