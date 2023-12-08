@extends('layouts.app')

@section('content')
<div class="flex flex-wrap mx-2.5 md:mx-5 gap-5">
    <article class="article mt-4">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#eee]">
            <h2 class="text-[20px] font-bold">Edit Kriteria</h2>
        </div>
            <div class="flex flex-col p-5">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                            <form action="{{ route('kriteria.update', ['kriterium' => $kriteria->id]) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded px-8 flex flex-col h-full">
                                @method('PUT')
                                @csrf
                                    <label for="name_kriteria" class="form-label block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Kriteria</label>
                                    <input type="text" name="name_kriteria" id="name_kriteria" class="peer h-10 rounded-md border-blue-gray-200 -t-transparent font-sans text-sm font-normal w-full bg-gray-200 text-gray-700 border  py-3 px-4 mb-3 focus:ring-gray-200 focus:bg-white" placeholder="" aria-describedby="name_kriteria" value="{{$kriteria->name_kriteria}}">

                                    <label for="attribute" class="form-label block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">Atribut Kriteria</label>
                                    <select name="attribute" id="attribute" class="peer h-10 rounded-md border-blue-gray-200 -t-transparent font-sans text-sm font-normal w-full bg-gray-200 text-gray-700 border px-4 mb-3 focus:ring-gray-200 focus:bg-white" aria-label="Default select example text-xs" value="{{$kriteria->attribute}}">
                                        <option value="benefit" selected>Benefit</option>
                                        <option value="cost">Cost</option>
                                    </select>

                                    <label for="bobot" class="form-label block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2">Bobot Kriteria</label>
                                    <input type="text" name="bobot" id="bobot" class="peer h-10 rounded-md border-blue-gray-200 -t-transparent font-sans text-sm font-normal w-full bg-gray-200 text-gray-700 border  py-3 px-4 mb-3 focus:ring-gray-200 focus:bg-white" aria-label="Default select example" placeholder="" aria-describedby="bobot" value="{{$kriteria->bobot}}">

                                    <button type="submit" class="btn btn-primary  block capitalize tracking-wide text-gray-700 text-xs font-bold mb-2 mt-2 p-2">Simpan</button>
                            </form>
                </div>
              </div>
        </div>
    </article>
</div>

@endsection
