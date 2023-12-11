@extends('layouts.app')

@section('content')
    <article class="article mt-4">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h4>List Sub Kriteria</h4>
        </div>
        <div class="block md:flex text-center p-5 border-[#eee] justify-center">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">No</th>
                                        <th scope="col" class="px-6 py-4">Nama Kriteria</th>
                                        <th scope="col" class="px-6 py-4">Sub Kriteria</th>
                                        <th scope="col" class="px-6 py-4">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($subKriteria as $index => $kriteria)
                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $index + 1 }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $kriteria->kriteria->name_kriteria }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @foreach($kriteria->rangeNilai as $range)
                                                {{ $range->range }} - {{ $range->nilai }} <br>
                                            @endforeach
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="{{ route('subkriteria.create') }}" class="btn btn-add-range px-6 py-2.5 border border-green-500 hover:bg-green-300">
                                                Tambah Sub
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection