@extends('layouts.app')
@section('content')

<!-- Start Header -->
<div class="p-1 bg-white flex justify-between items-center">
    <h1 class="mt-4 mb-4 ml-4 font-bold text-[20px] md:text-[25px] relative">Data Penilaian</h1>
</div>
<!-- End Header -->
<!-- Start content -->
<div class="flex flex-wrap mx-2.5 md:mx-5 gap-5">
    <article class="article mt-4">
        <div class="p-10 md:p-5 flex justify-between items-center bg-[#eee]">
            <h2 class="text-[20px] font-bold">Matriks Penilaian</h2>
        </div>

        <div class="block md:flex p-5 border-[#eee] justify-center items-center ">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden w-full">
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
                                    {{-- Baris untuk menghitung bobot jumlah pada masing-masing kriteria --}}
                                    <tr>
                                        <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                Jumlah Bobot
                                            </span>
                                        </td>
                                        @foreach ($kriteria as $c)
                                            <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{-- Hitung jumlah bobot untuk kriteria ini --}}
                                                    {{ $penilaian->where('id_kriteria', $c->id)->sum('value') }}
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
            <div class="mb-4 text-xl font-semibold text-gray-800 dark:text-white">Nilai Normalisasi</div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden w-full">
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
                                            @foreach ($kriteria as $c)
                                                {{-- Ambil nilai bobot dari penilaian --}}
                                                @php
                                                    $penilaianRecord = $penilaian
                                                        ->where('id_kriteria', $c->id)
                                                        ->where('id_alternatif', $a->id)
                                                        ->first();

                                                    $bobotKriteria = $penilaianRecord ? $penilaianRecord->value : 0;
                                                    $jumlahBobotKriteria = $penilaian->where('id_kriteria', $c->id)->sum('value');
                                                    $nilaiNormalisasi = $jumlahBobotKriteria != 0 ? $bobotKriteria / $jumlahBobotKriteria : 0;
                                                @endphp

                                                <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                        {{ number_format($nilaiNormalisasi, 2) }}
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
            <div class="mb-4 text-xl font-semibold text-gray-800 dark:text-white">Nilai Utilitas</div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden w-full">
                            <table class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternatif
                                        </th>
                                        @foreach ($kriteria as $index => $c)
                                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                C{{$index+1}}</th>
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
        <div class="block md:flex p-5 border-[#eee] justify-center items-center ">
            <div class="mb-4 text-xl font-semibold text-gray-800 dark:text-white">Nilai Akhir</div>
            <br>
            <div class="block md:flex p-5 border-[#eee] justify-center items-center">
                <div class="mb-4 text-xl font-semibold text-gray-800 dark:text-white">Nilai Utilitas, Normalisasi, dan Total Nilai Akhir</div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden w-full">
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
                                                    @php
                                                        // Menghitung nilai kriteria maksimal dan minimal
                                                        $Cmax = $penilaian->where('id_kriteria', $v->id)->max('value');
                                                        $Cmin = $penilaian->where('id_kriteria', $v->id)->min('value');

                                                        // Mengambil nilai kriteria untuk alternatif saat ini
                                                        $penilaianRecord = $penilaian
                                                            ->where('id_kriteria', $v->id)
                                                            ->where('id_alternatif', $a->id)
                                                            ->first();

                                                        // Menentukan nilai kriteria alternatif
                                                        $Cout = $penilaianRecord ? $penilaianRecord->value : 0;

                                                        // Inisialisasi nilai utilitas
                                                        $nilai_utilitas = 0;
                                                        // Logika penghitungan nilai utilitas
                                                        if ($c->attribute == 'cost') {
                                                            // Rumus untuk atribut cost
                                                            $denominator = ($Cmax - $Cmin) != 0 ? ($Cmax - $Cmin) : "undefined";
                                                            $nilai_utilitas = $denominator != "undefined" ? ($Cmax - $Cout) / $denominator * 100 : 0;
                                                        } elseif ($c->attribute == 'benefit') {
                                                            // Rumus untuk atribut benefit
                                                            $denominator = ($Cmax - $Cmin) != 0 ? ($Cmax - $Cmin) : "undefined";
                                                            $nilai_utilitas = $denominator != "undefined" ? ($Cout - $Cmin) / $denominator * 100 : 0;
                                                        }


                                                        // Ambil nilai bobot dari penilaian
                                                        $penilaianRecord = $penilaian
                                                            ->where('id_kriteria', $v->id)
                                                            ->where('id_alternatif', $a->id)
                                                            ->first();

                                                        $bobotKriteria = $penilaianRecord ? $penilaianRecord->value : 0;
                                                        $jumlahBobotKriteria = $penilaian->where('id_kriteria', $v->id)->sum('value');
                                                        $nilaiNormalisasi = $jumlahBobotKriteria != 0 ? $bobotKriteria / $jumlahBobotKriteria : 0;
                                                    @endphp
                                                    <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                            {{-- Tampilkan nilai utilitas * nilai normalisasi --}}
                                                            {{ number_format($nilaiNormalisasi * $nilai_utilitas, 2) }}
                                                        </span>
                                                    </td>
                                                    @php
                                                        // ... (penambahan nilai ke total nilai akhir)
                                                        $totalFinalValue += $nilaiNormalisasi * $nilai_utilitas;
                                                    @endphp
                                                @endforeach
                                                <!-- Tampilkan total nilai akhir untuk alternatif saat ini -->
                                                <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                        {{ number_format($totalFinalValue, 2) }}
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

        {{-- </div><div class="block md:flex p-5 border-[#eee] justify-center items-center">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full sm:px-6 lg:px-8 ">
                        <div class="overflow-hidden w-full">
                            <table class="items-center overflow-x-auto w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Ranking
                                        </th>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternatif
                                        </th>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($totalFinalValues as $rank => $total)
                                        @php
                                            $alternative = $alternatif->where('id', $rank)->first();
                                        @endphp
                                        <tr>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $rank + 1 }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $alternative->name_alternatif }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ number_format($total, 2) }}
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
        </div> --}}



    </article>
</div>


<script>
    setTwoNumberDecimal = myHTMLNumberInput.onchange ;

    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>
@endsection
