@extends('layouts.app')

@section('content')
    <article class="article mt-4">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h4>Edit Range Nilai</h4>
        </div>
        <div class="block md:flex text-center p-5 border-[#eee] justify-center">
            <div class="flex flex-col">
                <form action="{{ route('rangenilai.update', $rangeNilai->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="range" class="text-sm font-medium text-gray-700">Range</label>
                        <input type="text" name="range" id="range" value="{{ $rangeNilai->range }}" class="form-input mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="nilai" class="text-sm font-medium text-gray-700">Nilai</label>
                        <input type="text" name="nilai" id="nilai" value="{{ $rangeNilai->nilai }}" class="form-input mt-1 block w-full">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-edit px-6 py-2.5 border border-blue-500 hover:bg-blue-300">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </article>
@endsection