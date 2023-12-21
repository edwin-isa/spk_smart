@extends('layouts.app')
@section('content')

<!-- Start content -->
<div class="flex flex-wrap mx-2.5 md:mx-5 gap-5">
    <article class="article mt-4">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h4>Matriks Penilaian</h4>
         </div>
        <div class="block md:flex p-5 border-[#eee] justify-center items-center ">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="table-container" style="max-width: 97%; overflow-x: auto;" >
                            <table class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternatif
                                        </th>
                                        @foreach ($kriteria as $index => $c)
                                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                C{{ $index+1}}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatif as $a)
                                        <tr>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
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
                                                <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                        {{ $penilaianRecord ? $penilaianRecord->value : 0 }}
                                                    </span>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    {{-- Baris untuk menampilkan nilai minimal (Cmin) --}}
                                    <tr>
                                        <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Cmin
                                        </td>
                                        @foreach ($kriteria as $c)
                                            <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $Cmin[$c->id] }}
                                                </span>
                                            </td>
                                        @endforeach
                                    </tr>

                                    {{-- Baris untuk menampilkan nilai maksimal (Cmax) --}}
                                    <tr>
                                        <td class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Cmax
                                        </td>
                                        @foreach ($kriteria as $c)
                                            <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $Cmax[$c->id] }}
                                                </span>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block md:flex p-5 border-[#eee] justify-center items-center">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h4>Normalisasi Nilai Bobot</h4>
             </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="table-container" style="max-width: 97%; overflow-x: auto;" >
                            <table class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternatif
                                        </th>
                                        @foreach ($kriteria as $index => $c)
                                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                C{{ $index + 1 }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                        <!-- Baris untuk menghitung normalisasi bobot kriteria -->
                                        <tr>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    Normalisasi Bobot
                                                </span>
                                            </td>
                                            @foreach ($kriteria as $c)
                                                <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                        {{-- Hitung normalisasi bobot untuk kriteria ini --}}
                                                        @php
                                                            $bobotKriteria = $c->bobot / 100; // Ganti "bobot" dengan nama kolom yang sesuai
                                                            $normalisasiBobot = number_format($bobotKriteria, 2) ;
                                                        @endphp
                                                        {{ $normalisasiBobot }}
                                                    </span>
                                                </td>
                                            @endforeach
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block md:flex p-5 border-[#eee] justify-center items-center">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h4>Nilai Utilitas</h4>
             </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="table-container" style="max-width: 100%; overflow-x: auto;" >
                            <table class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternatif
                                        </th>
                                        @foreach ($kriteria as $index => $c)
                                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                C{{ $index + 1 }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatif as $a)
                                        <tr>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $a->name_alternatif }}
                                                </span>
                                            </td>
                                            @foreach ($kriteria as $v)
                                                <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                        {{ isset($nilaiUtilitasArray[$a->id][$v->id]) ? $nilaiUtilitasArray[$a->id][$v->id] : '' }}
                                                    </span>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block md:flex p-5 border-[#eee] justify-center items-center">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h4>Nilai Akhir dan Perankingan</h4>
             </div>
            <br>
            <div class="block md:flex p-5 border-[#eee] justify-center items-center">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="table-container" style="max-width: 90%; overflow-x: auto;" >
                                <table class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Alternatif
                                            </th>
                                            @foreach ($kriteria as $index => $c)
                                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                    C{{ $index + 1 }}
                                                </th>
                                            @endforeach
                                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Total Nilai Akhir
                                            </th>
                                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Ranking
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatif as $a)
                                            <tr>
                                                <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                        {{ $a->name_alternatif }}
                                                    </span>
                                                </td>
                                                @php
                                                    $totalFinalValue = 0;
                                                @endphp
                                                @foreach ($kriteria as $v)
                                                    <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                            {{ number_format($nilaiUtilitasArray[$a->id][$v->id], 2) }}
                                                        </span>
                                                    </td>
                                                    @php
                                                        // ... (penambahan nilai ke total nilai akhir)
                                                        $totalFinalValue += $nilaiUtilitasArray[$a->id][$v->id];
                                                    @endphp
                                                @endforeach
                                                <!-- Tampilkan total nilai akhir untuk alternatif saat ini -->
                                                <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                        {{ number_format($totalFinalValue, 2) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                        {{ $nilaiUtilitasArray[$a->id]['ranking'] }}
                                                    </span>
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
        </div>


    </article>
</div>
    <script>
        setTwoNumberDecimal = myHTMLNumberInput.onchange ;

        function setTwoNumberDecimal(event) {
            this.value = parseFloat(this.value).toFixed(2);
        }
    </script>
@endsection
