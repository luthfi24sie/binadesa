@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')

<!-- row 1 -->
<div class="flex flex-wrap -mx-3">
  <!-- card1 -->
  <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
      <div class="flex-auto p-4">
        <div class="flex flex-row -mx-3">
          <div class="flex-none w-2/3 max-w-full px-3">
            <div>
              <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Total Warga</p>
              <h5 class="mb-2 font-bold dark:text-white">{{ \App\Models\Warga::count() }}</h5>
              <p class="mb-0 dark:text-white dark:opacity-60">
                <span class="text-sm font-bold leading-normal text-emerald-500">Active</span>
                warga terdaftar
              </p>
            </div>
          </div>
          <div class="px-3 text-right basis-1/3">
            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
              <i class="ni leading-none ni-single-02 text-lg relative top-3.5 text-white"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- card2 -->
  <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
      <div class="flex-auto p-4">
        <div class="flex flex-row -mx-3">
          <div class="flex-none w-2/3 max-w-full px-3">
            <div>
              <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Total Keluarga</p>
              <h5 class="mb-2 font-bold dark:text-white">{{ \App\Models\Keluarga_kk::count() }}</h5>
              <p class="mb-0 dark:text-white dark:opacity-60">
                <span class="text-sm font-bold leading-normal text-emerald-500">Active</span>
                keluarga terdaftar
              </p>
            </div>
          </div>
          <div class="px-3 text-right basis-1/3">
            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
              <i class="ni leading-none ni-single-copy-04 text-lg relative top-3.5 text-white"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- card3 -->
  <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
      <div class="flex-auto p-4">
        <div class="flex flex-row -mx-3">
          <div class="flex-none w-2/3 max-w-full px-3">
            <div>
              <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Kelahiran Bulan Ini</p>
              <h5 class="mb-2 font-bold dark:text-white">{{ \App\Models\PeristiwaKelahiran::whereMonth('created_at', now()->month)->count() }}</h5>
              <p class="mb-0 dark:text-white dark:opacity-60">
                <span class="text-sm font-bold leading-normal text-emerald-500">This month</span>
                kelahiran baru
              </p>
            </div>
          </div>
          <div class="px-3 text-right basis-1/3">
            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
              <i class="ni leading-none ni-badge text-lg relative top-3.5 text-white"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- card4 -->
  <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
      <div class="flex-auto p-4">
        <div class="flex flex-row -mx-3">
          <div class="flex-none w-2/3 max-w-full px-3">
            <div>
              <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Kematian Bulan Ini</p>
              <h5 class="mb-2 font-bold dark:text-white">{{ \App\Models\PeristiwaKematian::whereMonth('created_at', now()->month)->count() }}</h5>
              <p class="mb-0 dark:text-white dark:opacity-60">
                <span class="text-sm font-bold leading-normal text-red-600">This month</span>
                kematian
              </p>
            </div>
          </div>
          <div class="px-3 text-right basis-1/3">
            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
              <i class="ni leading-none ni-fat-remove text-lg relative top-3.5 text-white"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- cards row 2 -->
<div class="flex flex-wrap mt-6 -mx-3">
  <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
    <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
      <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
        <h6 class="capitalize dark:text-white">Quick Actions</h6>
        <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
          <i class="fa fa-bolt text-emerald-500"></i>
          <span class="font-semibold">Quick access</span> to common tasks
        </p>
      </div>
      <div class="flex-auto p-4">
        <div class="grid grid-cols-2 gap-4">
          <a href="{{ route('warga.create') }}" class="relative flex flex-col min-w-0 break-words bg-gradient-to-tl from-blue-500 to-violet-500 rounded-2xl bg-clip-border p-4 text-white shadow-lg">
            <div class="flex items-center">
              <div class="inline-block w-12 h-12 text-center text-white bg-center shadow-sm fill-current stroke-none bg-white/20 rounded-xl">
                <i class="ni ni-single-02 text-xl relative top-2"></i>
              </div>
              <div class="ml-4">
                <h6 class="mb-0 text-white font-semibold">Tambah Warga</h6>
                <p class="text-xs text-white/80">Data warga baru</p>
              </div>
            </div>
          </a>
          <a href="{{ route('keluarga_kk.create') }}" class="relative flex flex-col min-w-0 break-words bg-gradient-to-tl from-emerald-500 to-teal-400 rounded-2xl bg-clip-border p-4 text-white shadow-lg">
            <div class="flex items-center">
              <div class="inline-block w-12 h-12 text-center text-white bg-center shadow-sm fill-current stroke-none bg-white/20 rounded-xl">
                <i class="ni ni-single-copy-04 text-xl relative top-2"></i>
              </div>
              <div class="ml-4">
                <h6 class="mb-0 text-white font-semibold">Tambah Keluarga</h6>
                <p class="text-xs text-white/80">Data keluarga baru</p>
              </div>
            </div>
          </a>
          <a href="{{ route('peristiwa_kelahiran.create') }}" class="relative flex flex-col min-w-0 break-words bg-gradient-to-tl from-cyan-500 to-blue-500 rounded-2xl bg-clip-border p-4 text-white shadow-lg">
            <div class="flex items-center">
              <div class="inline-block w-12 h-12 text-center text-white bg-center shadow-sm fill-current stroke-none bg-white/20 rounded-xl">
                <i class="ni ni-badge text-xl relative top-2"></i>
              </div>
              <div class="ml-4">
                <h6 class="mb-0 text-white font-semibold">Data Kelahiran</h6>
                <p class="text-xs text-white/80">Catat kelahiran</p>
              </div>
            </div>
          </a>
          <a href="{{ route('peristiwa_kematian.create') }}" class="relative flex flex-col min-w-0 break-words bg-gradient-to-tl from-orange-500 to-red-500 rounded-2xl bg-clip-border p-4 text-white shadow-lg">
            <div class="flex items-center">
              <div class="inline-block w-12 h-12 text-center text-white bg-center shadow-sm fill-current stroke-none bg-white/20 rounded-xl">
                <i class="ni ni-fat-remove text-xl relative top-2"></i>
              </div>
              <div class="ml-4">
                <h6 class="mb-0 text-white font-semibold">Data Kematian</h6>
                <p class="text-xs text-white/80">Catat kematian</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
    <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
      <div class="p-4 pb-0 rounded-t-4">
        <h6 class="mb-0 dark:text-white">Recent Activities</h6>
      </div>
      <div class="flex-auto p-4">
        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
          <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
            <div class="flex items-center">
              <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                <i class="text-white ni ni-single-02 relative top-0.75 text-xxs"></i>
              </div>
              <div class="flex flex-col">
                <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Data Warga</h6>
                <span class="text-xs leading-tight dark:text-white/80">Total: <span class="font-semibold">{{ \App\Models\Warga::count() }} warga</span></span>
              </div>
            </div>
            <div class="flex">
              <a href="{{ route('warga.index') }}" class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white">
                <i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i>
              </a>
            </div>
          </li>
          <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-xl text-inherit">
            <div class="flex items-center">
              <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-emerald-500 to-teal-400 rounded-xl">
                <i class="text-white ni ni-single-copy-04 relative top-0.75 text-xxs"></i>
              </div>
              <div class="flex flex-col">
                <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Data Keluarga</h6>
                <span class="text-xs leading-tight dark:text-white/80">Total: <span class="font-semibold">{{ \App\Models\Keluarga_kk::count() }} keluarga</span></span>
              </div>
            </div>
            <div class="flex">
              <a href="{{ route('keluarga_kk.index') }}" class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white">
                <i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i>
              </a>
            </div>
          </li>
          <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-b-lg rounded-xl text-inherit">
            <div class="flex items-center">
              <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-cyan-500 to-blue-500 rounded-xl">
                <i class="text-white ni ni-badge relative top-0.75 text-xxs"></i>
              </div>
              <div class="flex flex-col">
                <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Data Kelahiran</h6>
                <span class="text-xs leading-tight dark:text-white/80">Total: <span class="font-semibold">{{ \App\Models\PeristiwaKelahiran::count() }} kelahiran</span></span>
              </div>
            </div>
            <div class="flex">
              <a href="{{ route('peristiwa_kelahiran.index') }}" class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white">
                <i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection