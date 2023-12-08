@extends('layouts.app')
@section('content')
    <article class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 md:w-8/12 md:flex-0">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80">Tambah Kriteria</p>
                        </div>
                    </div>
                    <div class="flex-auto p-6">
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
                </div>
            </div>
        </div>
    </article>
@endsection
