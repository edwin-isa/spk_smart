@extends('layouts.app')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                {{-- <div class="flex-auto px-0 pt-0 pb-2"> --}}
                    <!-- Content goes here -->
                    <div class="table-container" style="max-width: 80%;">
                        <table class="w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">
                                        Alternatif
                                    </th>
                                    @foreach ($kriteria as $index => $c)
                                        <th scope="col" class="px-6 py-4">
                                            C{{ $index + 1 }}
                                        </th>
                                    @endforeach
                                    <th scope="col" class="px-6 py-4">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatif as $a)
                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                            <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $a->name_alternatif }}
                                            </span>
                                        </td>
                                        @foreach ($kriteria as $c)
                                            @php
                                                $penilaianRecord = $penilaian
                                                    ->where('id_kriteria', $c->id)
                                                    ->where('id_alternatif', $a->id)
                                                    ->first();
                                            @endphp

                                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $penilaianRecord ? $penilaianRecord->value : 0 }}
                                                </span>
                                            </td>
                                        @endforeach

                                        <td class="p-2 align-middle flex just bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <a href="javascript:void(0);" onclick="toggleModal('add-criterias-{{ $a->id }}')"
                                                class="focus:outline-none bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                Add
                                            </a>
                                        </td>
                                      <!-- Main modal -->
                                        <div id="add-criterias-{{ $a->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 w-full md:inset-0 max-h-[80vh] modal-max-width">
                                            <div class="relative p-4 w-full max-w-md max-h-full overflow-y-auto">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            {{ $a->name_alternatif }}
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-toggle="add-criterias-modal-{{ $a->id }}">
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <form class="mx-3 p-4 md:p-5" id="add-criterias-{{ $a->id }}" action="{{ route('penilaian.store') }}" method="POST">
                                                        @csrf
                                                        <div class="mx-2 grid gap-4 grid-cols-3"> <!-- Set grid-cols-3 for three columns -->
                                                            <input type="text" name="id_alternatif" hidden value="{{ $a->id }}">
                                                            @foreach ($kriteria as $c)
                                                                <div class="col-span-1">
                                                                    <label for="nilai_{{ $c->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                        {{ $c->name_kriteria }}
                                                                    </label>
                                                                    <input type="number" onchange="setTwoNumberDecimal" min="0" step="0.01"
                                                                        value="{{ $penilaianRecord ? $penilaianRecord->where('id_kriteria', $c->id)->where('id_alternatif', $a->id)->first()->value : 0 }}"
                                                                        name="nilai[{{ $c->id }}]" id="nilai_{{ $c->id }}"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                        placeholder="" required="">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button type="submit"
                                                            class="inline-block mt-10 px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all bg-transparent rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25">
                                                            Add Data
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <style>
        .modal-max-width {
            max-width: 78vw; /* Adjust the percentage as needed */
        }

        .modal-max-height {
            max-height: 50vh; /* Adjust the percentage as needed */
            overflow-y: auto; /* Enable vertical scrolling if needed */
        }
    </style>


    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
            // Add the following lines to check and adjust modal dimensions
            const modalContent = modal.querySelector('.relative');
            if (!modalContent) return;
            modalContent.style.maxWidth = window.innerWidth * 0.8 + 'px';
            modalContent.style.maxHeight = window.innerHeight * 0.8 + 'px';
        }
    </script>


@endsection
