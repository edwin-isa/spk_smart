<!--

=========================================================
* Argon Dashboard 2 Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
        <title>TI 3D Kelompok 4 - SPK Metode SMART</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        <style>
            .nav-link.active {
                background-color: rgba(74, 144, 226, 0.5);
            }
        </style>
    </head>
    <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
        </div>
        <!-- sidenav -->
        <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
            @include('layouts.sidebar')
        </aside>
        <!-- end sidenav -->
        <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
            <!-- Navbar -->
            <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
                <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                    <nav>
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                            <li class="text-sm leading-normal">
                                <a class="text-white opacity-50" href="javascript:;">Pages</a>
                            </li>
                            <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page"></li>
                        </ol>
                        <h6 class="mb-0 font-bold text-white capitalize"></h6>
                    </nav>
                    <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto"></div>
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                    <li class="flex items-center">
                        <a href="#" class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt sm:mr-1"></i>
                            <span class="hidden sm:inline">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                </div>
            </nav>
            <!-- end Navbar -->
            <!-- end cards -->
            <div class="w-full px-6 py-6 mx-auto">
                <!-- table 1 -->
                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-full px-3">
                        <div class="relative min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <!-- Content goes here -->
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- plugin for charts -->
        <script src="./assets/js/plugins/chartjs.min.js" async></script>
        <!-- plugin for scrollbar -->
        <script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script>
        <!-- main script file -->
        <script src="./assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
        <script>
            // Daftar menu dan judul halaman yang sesuai
            var pages = {
                "dashboard": "Studi Kasus",
                "alternatif": "Alternatif",
                "kriteria": "Kriteria",
                "penilaian": "Penilaian",
                "perhitungan": "Perhitungan",
                "rekomendasi": "Rekomendasi",
            };

            // Fungsi untuk mengubah judul halaman
            function changePage(page) {
                var title = pages[page];
                if (title) {
                    document.querySelector('li[aria-current="page"]').textContent = title;
                    document.querySelector('h6').textContent = title;
                }
            }

            // Event listener untuk klik menu
            document.querySelectorAll('nav a').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var page = this.getAttribute('href').substring(1); // Menghilangkan karakter "/" di awal
                    window.history.pushState({}, '', page); // Mengubah URL tanpa me-refresh halaman
                    changePage(page);
                });
            });

            // Inisialisasi judul halaman saat pertama kali memuat halaman
            changePage(window.location.pathname.substring(1));
        </script>

        <!-- Footer-->
        <footer>
            <div class="flex flex-wrap -mx-3">
                <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                    <p class="mb-0 text-slate-400">
                        Copyright ©
                        <script>
                        document.write(new Date().getFullYear());
                        </script>
                        KELOMPOK 4 - TI 3D
                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>