<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
  <link rel="stylesheet" href="{{ asset('assets-admin-volt/css/argon-dashboard-tailwind.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin-volt/css/nucleo-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin-volt/css/nucleo-svg.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-[#F8FAFC] via-white to-[#ECFEFF] font-[Plus Jakarta Sans]">
  <div class="fixed inset-0 pointer-events-none">
    <div class="absolute -top-24 -right-24 w-[28rem] h-[28rem] bg-cyan-200/30 blur-[140px] rounded-full"></div>
    <div class="absolute -bottom-24 -left-24 w-[32rem] h-[32rem] bg-blue-200/20 blur-[160px] rounded-full"></div>
  </div>
  <div class="relative min-h-screen grid place-items-center p-6">
    <div class="w-full max-w-md bg-white/90 backdrop-blur-xl rounded-[1.75rem] shadow-2xl border border-white/60">
      <div class="p-8">
        <div class="text-center">
          <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-400 text-white mx-auto">
            <img src="{{ asset('assets-admin-volt/img/logo-ct.png') }}" class="w-6 h-6" alt="logo">
          </div>
          <div class="mt-4 text-2xl font-bold tracking-tight text-slate-800">Masuk ke Akun</div>
          <div class="text-sm text-slate-500">Silakan isi kredensial untuk melanjutkan</div>
        </div>
        @if($errors->any())
          <div class="mt-4 px-4 py-2 rounded-xl bg-rose-50 text-rose-600 border border-rose-100">Email atau password salah</div>
        @endif
        <form method="post" action="{{ route('login.post') }}" class="mt-6 space-y-5">
          @csrf
          <div class="space-y-2">
            <label class="text-xs font-medium text-slate-600">Email</label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"><i class="ni ni-email-83"></i></span>
              <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-9 pr-3 py-3 rounded-2xl border border-slate-200 bg-white text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="you@example.com">
            </div>
            @error('email')<div class="text-rose-600 text-xs">{{ $message }}</div>@enderror
          </div>
          <div class="space-y-2">
            <label class="text-xs font-medium text-slate-600">Password</label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"><i class="ni ni-lock-circle-open"></i></span>
              <input type="password" name="password" class="w-full pl-9 pr-3 py-3 rounded-2xl border border-slate-200 bg-white text-slate-800 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="••••••••">
            </div>
            @error('password')<div class="text-rose-600 text-xs">{{ $message }}</div>@enderror
          </div>
          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 text-sm"><input type="checkbox" name="remember" value="1" class="rounded"> Ingat saya</label>
            <a href="#" class="text-sm text-blue-600">Lupa password?</a>
          </div>
          <button class="w-full px-4 py-3 bg-gradient-to-r from-blue-600 to-cyan-400 text-white rounded-2xl shadow-lg hover:shadow-xl transition">Masuk</button>
          <div class="text-center text-sm text-slate-600">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 font-medium">Buat Akun</a></div>
        </form>
        <div class="mt-6 text-center text-xs text-slate-400">© {{ date('Y') }} Argon Dashboard Tailwind</div>
      </div>
    </div>
  </div>
</body>
</html>
