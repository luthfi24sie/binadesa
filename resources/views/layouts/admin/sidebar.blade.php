<!-- sidenav  -->
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
  <div class="h-19">
    <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
    <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="{{ route('dashboard') }}">
      <img src="{{ asset('assets-argon/img/logo-ct-dark.png') }}" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
      <img src="{{ asset('assets-argon/img/logo-ct.png') }}" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
      <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Argon Dashboard 2</span>
    </a>
  </div>

  <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

  <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
      <li class="mt-0.5 w-full">
        <a class="py-2.7 {{ request()->is('dashboard') ? 'bg-blue-500/13 dark:text-white dark:opacity-80' : 'dark:text-white dark:opacity-80' }} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="{{ route('dashboard') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
        </a>
      </li>

      <li class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Data Penduduk</h6>
      </li>

      <li class="mt-0.5 w-full">
        <a class="{{ request()->is('warga*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80' : 'dark:text-white dark:opacity-80' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('warga.index') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-02"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Warga</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="{{ request()->is('keluarga_kk*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80' : 'dark:text-white dark:opacity-80' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('keluarga_kk.index') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-single-copy-04"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Keluarga</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="{{ request()->is('peristiwa_kelahiran*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80' : 'dark:text-white dark:opacity-80' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('peristiwa_kelahiran.index') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-badge"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Kelahiran</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="{{ request()->is('peristiwa_kematian*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80' : 'dark:text-white dark:opacity-80' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('peristiwa_kematian.index') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-fat-remove"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Kematian</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="{{ request()->is('peristiwa_pindah*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80' : 'dark:text-white dark:opacity-80' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('peristiwa_pindah.index') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-purple-500 ni ni-send"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Pindah</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class="{{ request()->is('media*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80' : 'dark:text-white dark:opacity-80' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('media.index') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-indigo-500 ni ni-folder-17"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Media</span>
        </a>
      </li>

      <li class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages</h6>
      </li>

      <li class="mt-0.5 w-full">
        <a class="{{ request()->is('profile') ? 'bg-blue-500/13 dark:text-white dark:opacity-80' : 'dark:text-white dark:opacity-80' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('profile') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
        </a>
      </li>

      @guest
      <li class="mt-0.5 w-full">
        <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('login') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-copy-04"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign In</span>
        </a>
      </li>
      @else
      <li class="mt-0.5 w-full">
        <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-red-500 ni ni-button-power"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
      @endguest
    </ul>
  </div>

  <div class="mx-4">
    <!-- load phantom colors for card after: -->
    <p class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 dark:bg-white bg-slate-500 bg-gray-500/30 bg-cyan-500/30 bg-emerald-500/30 bg-orange-500/30 bg-red-500/30 after:bg-gradient-to-tl after:from-zinc-800 after:to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 after:from-blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400"></p>
    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border" sidenav-card>
      <img class="w-1/2 mx-auto" src="{{ asset('assets-argon/img/illustrations/icon-documentation.svg') }}" alt="sidebar illustrations" />
      <div class="flex-auto w-full p-4 pt-0 text-center">
        <div class="transition-all duration-200 ease-nav-brand">
          <h6 class="mb-0 dark:text-white text-slate-700">Need help?</h6>
          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Please check our docs</p>
        </div>
      </div>
    </div>
  </div>
</aside>
<!-- end sidenav -->