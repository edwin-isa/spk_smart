<div class="h-15">
    <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
    <a class="block px-10 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-navy-700 text-center" href="{{ route('dashboard.index') }}" target="_blank">
        <i class="fas fa-cogs mr-2"></i><span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand text-xl">DASHBOARD</span>
    </a>
</div>

<hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

<div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-0.5 w-full">
            <a class="nav-link py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @if(Request::is('dashboard*')) active @endif" href="{{ route('dashboard.index') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-red-500 ni ni-atom"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Studi Kasus</span>
            </a>
        </li>

        <li class="mt-0.5 w-full">
            <a class="nav-link py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @if(Request::is('alternatif*')) active @endif" href="{{ route('alternatif.index') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-single-02"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Alternatif</span>
            </a>
        </li>

        <li class="mt-0.5 w-full">
            <a class="nav-link py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @if(Request::is('kriteria*')) active @endif" href="{{ route('kriteria.index') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-credit-card"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Kriteria</span>
            </a>
        </li>

        <li class="mt-0.5 w-full">
            <a class="nav-link py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @if(Request::is('penilaian*')) active @endif" href="{{ route('penilaian.index') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-gray-500 fas fa-pencil-alt"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Penilaian</span>
            </a>
        </li>

        <li class="mt-0.5 w-full">
            <a class="nav-link py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @if(Request::is('perhitungan*')) active @endif" href="{{ route('perhitungan.index') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-cyan-500 fas fa-calculator"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Perhitungan</span>
            </a>
        </li>

        <li class="mt-0.5 w-full">
            <a class="nav-link py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors @if(Request::is('rekomendasi*')) active @endif" href="{{ route('rekomendasi.index') }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-emerald-500 fas fa-bookmark"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Rekomendasi</span>
            </a>
        </li>
    </ul>
</div>