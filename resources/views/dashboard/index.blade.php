@extends('layouts.app')

<style>
    .pdf-link {
        color: purple;
        text-decoration: none;
        border-bottom: 1px solid transparent;
        transition: border-color 0.3s ease-in-out;
    }

    .pdf-link:hover {
        border-color: purple;
    }
</style>

@section('content')
    <article class="article mt-4">
        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex flex-wrap items-center justify-center">
            
            <div class="w-full mb-6" style="font-size: 30px; font-family: Georgia;">
                <span style="font-weight: normal;">Welcome,</span>
                <span style="font-weight: bold; color: navy;">{{ auth()->user()->name }}!</span>
            </div>

            <!-- card alternatif -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 mx-auto">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-black dark:opacity-60" style="margin-top: 2px;">Alternatif</p>
                                    <h1 class="font-bold dark:text-black text-3xl" style="margin-top: 2px; margin-bottom: 2px;">{{ \App\Models\Alternatif::count() }}</h1>
                                    <p style="margin-bottom: 2px;">Siswa</p>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3 flex items-center">
                                <div class="inline-block w-16 h-16 text-center rounded-full bg-gradient-to-tl from-blue-500 to-violet-400 flex items-center justify-center" style="font-size: 40px; margin-top: 4px; margin-bottom: 4px;">
                                    <i class="ni leading-none ni-single-02 text-4xl text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card kriteria -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 mx-auto">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-black dark:opacity-60" style="margin-top: 2px;">KRITERIA</p>
                                    <h1 class="font-bold dark:text-black text-3xl" style="margin-top: 2px; margin-bottom: 2px;">{{ \App\Models\Kriteria::count() }}</h1>
                                    <p style="margin-bottom: 2px;">Jenis</p>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3 flex items-center">
                                <div class="inline-block w-16 h-16 text-center rounded-full bg-gradient-to-tl from-orange-500 to-orange-400 flex items-center justify-center" style="font-size: 40px; margin-top: 4px; margin-bottom: 4px;">
                                    <i class="ni leading-none ni-credit-card text-4xl text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card rekomendasi penerima beasiswa -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 mx-auto">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-black dark:opacity-60" style="margin-top: 2px;">Rekomendasi</p>
                                    <h1 class="font-bold dark:text-black text-3xl" style="margin-top: 2px; margin-bottom: 2px;">3</h1> <!-- sesuaikan dengan model rekomendasi -->
                                    <p style="margin-bottom: 2px;">Siswa</p>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3 flex items-center">
                                <div class="inline-block w-16 h-16 text-center rounded-full bg-gradient-to-tl from-emerald-500 to-emerald-400 flex items-center justify-center" style="font-size: 40px; margin-top: 4px; margin-bottom: 4px;">
                                    <i class="ni leading-none ni-paper-diploma text-4xl text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Studi Kasus -->
            <h6 class="w-full mt-6 text-xl border-b">Studi Kasus</h6>
            
            <p class="w-full mt-2 mb-6 text-gray-700 dark:text-gray-300">
                Beasiswa merupakan bentuk bantuan atau pemberian yang diberikan kepada pelajar untuk mendukung pembiayaan pendidikan. Tujuan utama dari beasiswa adalah untuk menciptakan 
                kesempatan yang lebih adil dan merata dalam akses pendidikan. Namun, masih terdapat banyak pemberian beasiswa yang tidak tepat, sehingga menyebabkan ketidakadilan dalam 
                sistem pendidikan. Sistem Pendukung Keputusan Berbasis Web ini bertujuan untuk mengatasi masalah tersebut untuk pemilihan penerimaan beasiswa menggunakan metode 
                Simple Multi Attribute Rating Technique (SMART) dengan studi kasus pada suatu Sekolah Menengah Atas (SMA). Alternatif yang digunakan berupa rata-rata rapor, penghasilan ayah, 
                penghasilan ibu, semester, kelas, jumlah saudara kandung, jumlah saudara yang sudah menikah, jumlah organisasi, jumlah prestasi, dan jumlah uang jajan perhari sebagai input 
                untuk menentukan penerimaan beasiswa.
            </p>

            <!-- Referensi Jurnal -->
            <h6 class="w-full text-xl border-b">Jurnal Referensi</h6>
            
            <p class="w-full mt-2 mb-2 text-gray-700 dark:text-gray-300">
            Referensi jurnal ini digunakan untuk membandingkan hasil akhir penerima beasiswa terbaik menggunakan metode yang ada pada jurnal, yakni metode Simple Additive Weight (SAW)
            dengan metode yang kami gunakan, yakni metode SMART. 
            </p>
            <p class="w-full mt-2 mb-6 text-gray-700 dark:text-gray-300">
                <a href="http://ejurnal.ars.ac.id/index.php/jti/article/view/1288/763" target="_blank" class="pdf-link">PDF</a>
            </p>
        </div>
    </article>
@endsection