@extends('layouts.app')
@section('content')
    <article class="article mt-4">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h4>List Kriteria</h4>
         </div>
         <div class="flex justify-end w-full mt-4 px-4">
             <a href="{{ route('kriteria.create') }}" class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25">
                 <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data
             </a>
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
                            <th scope="col" class="px-6 py-4">Jenis Kriteria</th>
                            <th scope="col" class="px-6 py-4">Bobot</th>
                            <th scope="col" class="px-6 py-4">Kode</th>
                            <th scope="col" class="px-6 py-4">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="">
                         @foreach ($kriteria as $index => $kri)
                          <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $index + 1 }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $kri->name_kriteria }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $kri->attribute }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $kri->bobot }}</td>
                            <td class="whitespace-nowrap px-6 py-4">C{{ $index+1}}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <form action="{{ route('kriteria.destroy', $kri->id) }}" method="POST">
                                    <a href="{{ route('kriteria.edit', $kri->id) }}" class="btn btn-edit px-6 py-2.5 border border-blue-500 hover:bg-blue-300">
                                        Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete px-6 py-2.5 border border-red-600 hover:bg-red-300 ml-6">
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
