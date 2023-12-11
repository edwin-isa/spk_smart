@extends('layouts.app')

@section('content')
    <article class="article mt-4">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h4>List Range Nilai</h4>
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
                                        <th scope="col" class="px-6 py-4">Sub Kriteria</th>
                                        <th scope="col" class="px-6 py-4">Range</th>
                                        <th scope="col" class="px-6 py-4">Nilai</th>
                                        <th scope="col" class="px-6 py-4">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($rangeNilai as $index => $range)
                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $index + 1 }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $range->subKriteria->nama_sub_kriteria }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $range->range }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $range->nilai }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="{{ route('rangenilai.edit', $range->id) }}" class="btn btn-edit px-6 py-2.5 border border-blue-500 hover:bg-blue-300">
                                                Edit
                                            </a>
                                            <form action="{{ route('rangenilai.destroy', $range->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete px-6 py-2.5 border border-red-600 hover:bg-red-300 ml-2">
                                                    Hapus
                                                </button>
                                            </form>
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