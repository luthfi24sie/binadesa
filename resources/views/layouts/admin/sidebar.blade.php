<aside class="w-64 min-h-screen bg-white shadow-xl rounded-3xl flex flex-col p-6">

    <!-- Logo -->
    <div class="flex items-center mb-10 gap-3 px-2">
        <img src="{{ asset('assets-admin/img/logo-ct-dark.png') }}" class="h-8" alt="Logo">
        <span class="font-semibold text-[#5e72e4] text-lg">Argon Dashboard 2</span>
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

            {{-- DATA PENDUDUK --}}
            <li x-data="{ 
                    open: {{ 
                        request()->is('keluarga_kk*') || 
                        request()->is('warga*') || 
                        request()->is('kelahiran*') || 
                        request()->is('kematian*') || 
                        request()->is('pindah*') || 
                        request()->is('media*')
                        ? 'true' : 'false' 
                    }} 
                }">

                <!-- Button -->
                <button @click="open = !open"
                        class="flex items-center justify-between w-full px-4 py-3 rounded-xl hover:bg-gray-100 text-gray-700">
                    <div class="flex items-center gap-3">
                        <i class="ni ni-collection text-lg text-purple-500"></i>
                        <span>Data Penduduk</span>
                    </div>

                    <i class="ni ni-bold-down text-xs transition"
                       :class="open ? 'rotate-180' : ''"></i>
                </button>

                <!-- Dropdown -->
                <ul x-show="open" x-transition class="pl-10 pr-4 space-y-1 mt-2">

                {{-- Data Warga --}}
                    <li>
                        <a href="{{ route('warga.index') }}"
                           class="flex items-center gap-2 px-3 py-2 rounded-lg
                                  {{ request()->is('warga*') 
                                     ? 'bg-[#5e72e4] text-white font-semibold shadow'
                                     : 'hover:bg-gray-100 text-gray-700' }}">
                            <i class="ni ni-single-02 text-sm"></i>
                            <span>Data Warga</span>
                        </a>
                    </li>


                    {{-- Data Keluarga --}}
                    <li>
                        <a href="{{ route('keluarga_kk.index') }}"
                           class="flex items-center gap-2 px-3 py-2 rounded-lg
                                  {{ request()->is('keluarga_kk*') 
                                     ? 'bg-[#5e72e4] text-white font-semibold shadow' 
                                     : 'hover:bg-gray-100 text-gray-700' }}">
                            <i class="ni ni-single-copy-04 text-sm"></i>
                            <span>Data Keluarga</span>
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


                    {{-- Media --}}
                    <li>
                        <a href="{{ route('media.index') }}"
                           class="flex items-center gap-2 px-3 py-2 rounded-lg
                                  {{ request()->is('media*') 
                                     ? 'bg-[#5e72e4] text-white font-semibold shadow'
                                     : 'hover:bg-gray-100 text-gray-700' }}">
                            <i class="ni ni-folder-17 text-sm"></i>
                            <span>Media</span>
                        </a>
                    </li>

                </ul>
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