@extends('layouts.app')

@section('content')
    <article class="article mt-4">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h4>Tambah Sub Kriteria</h4>
        </div>
        <div class="block md:flex text-center p-5 border-[#eee] justify-center">
            <div class="flex flex-col">
                <form action="{{ route('subkriteria.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_sub_kriteria" class="text-sm font-medium text-gray-700">Nama Sub Kriteria</label>
                        <input type="text" name="nama_sub_kriteria" id="nama_sub_kriteria" class="form-input mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="kriteria_id" class="text-sm font-medium text-gray-700">Nama Kriteria</label>
                        <select name="kriteria_id" id="kriteria_id" class="form-select mt-1 block w-full">
                            @foreach($kriteria as $item)
                                <option value="{{ $item->id }}">{{ $item->name_kriteria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-edit px-6 py-2.5 border border-blue-500 hover:bg-blue-300">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </article>
@endsection