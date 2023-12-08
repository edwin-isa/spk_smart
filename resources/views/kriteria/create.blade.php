@extends('layouts.app')

@section('content')
    <div class="w-full p-6 mx-auto">
        <div class="flex items-center justify-center">
            <h4 class="mb-0 dark:text-white/80">Tambah Kriteria</h4>
        </div>
        <form action="{{ route('kriteria.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name_kriteria" class="block text-gray-700 text-sm font-semibold mb-2">Nama Kriteria</label>
                <input type="text" name="name_kriteria" id="name_kriteria" class="form-input w-full py-2 px-3 border rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="attribute" class="block text-gray-700 text-sm font-semibold mb-2">Jenis Kriteria</label>
                <select name="attribute" id="attribute" class="form-select w-full py-2 px-3 border rounded-md shadow-sm" required>
                    <option value="benefit">Benefit</option>
                    <option value="cost">Cost</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="bobot" class="block text-gray-700 text-sm font-semibold mb-2">Bobot Kriteria</label>
                <input type="text" name="bobot" id="bobot" class="form-input w-full py-2 px-3 border rounded-md shadow-sm" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md transition duration-300 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Simpan
            </button>
        </form>
    </div>
@endsection
