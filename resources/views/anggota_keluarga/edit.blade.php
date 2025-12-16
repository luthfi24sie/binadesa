<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota Keluarga - Sistem Kependudukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            border-radius: 10px;
            margin: 5px 0;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
        .main-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .navbar {
            background: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar p-3">
                    <div class="text-center mb-4">
                        <h4 class="text-white"><i class="fas fa-users"></i> Kependudukan</h4>
                        <small class="text-white-50">Sistem Data Penduduk</small>
                    </div>
                    
                    <nav class="nav flex-column">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                        <a href="{{ route('anggota-keluarga.index') }}" class="nav-link active">
                            <i class="fas fa-users me-2"></i> Anggota Keluarga
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fas fa-home me-2"></i> Keluarga KK
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fas fa-baby me-2"></i> Kelahiran
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fas fa-cross me-2"></i> Kematian
                        </a>
                        <a href="#" class="nav-link">
                            <i class="fas fa-truck me-2"></i> Pindah
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 px-0">
                <div class="main-content">
                    <!-- Top Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <h5 class="mb-0">Edit Anggota Keluarga</h5>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('anggota-keluarga.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-1"></i>Kembali
                                </a>
                            </div>
                        </div>
                    </nav>

                    <!-- Content -->
                    <div class="p-4">
                        <!-- Alert Messages -->
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Form -->
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Form Edit Anggota Keluarga</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('anggota-keluarga.update', $item) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="kk_id" class="form-label">
                                                <i class="fas fa-home me-1"></i>KK ID <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" 
                                                   class="form-control @error('kk_id') is-invalid @enderror" 
                                                   id="kk_id" 
                                                   name="kk_id" 
                                                   value="{{ old('kk_id', $item->kk_id) }}" 
                                                   placeholder="Masukkan KK ID"
                                                   required>
                                            @error('kk_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="warga_id" class="form-label">
                                                <i class="fas fa-user me-1"></i>Warga ID <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" 
                                                   class="form-control @error('warga_id') is-invalid @enderror" 
                                                   id="warga_id" 
                                                   name="warga_id" 
                                                   value="{{ old('warga_id', $item->warga_id) }}" 
                                                   placeholder="Masukkan Warga ID"
                                                   required>
                                            @error('warga_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="hubungan" class="form-label">
                                            <i class="fas fa-heart me-1"></i>Hubungan <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select @error('hubungan') is-invalid @enderror" 
                                                id="hubungan" 
                                                name="hubungan" 
                                                required>
                                            <option value="">Pilih Hubungan</option>
                                            <option value="Kepala Keluarga" {{ old('hubungan', $item->hubungan) == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                            <option value="Istri" {{ old('hubungan', $item->hubungan) == 'Istri' ? 'selected' : '' }}>Istri</option>
                                            <option value="Anak" {{ old('hubungan', $item->hubungan) == 'Anak' ? 'selected' : '' }}>Anak</option>
                                            <option value="Menantu" {{ old('hubungan', $item->hubungan) == 'Menantu' ? 'selected' : '' }}>Menantu</option>
                                            <option value="Cucu" {{ old('hubungan', $item->hubungan) == 'Cucu' ? 'selected' : '' }}>Cucu</option>
                                            <option value="Orang Tua" {{ old('hubungan', $item->hubungan) == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                                            <option value="Mertua" {{ old('hubungan', $item->hubungan) == 'Mertua' ? 'selected' : '' }}>Mertua</option>
                                            <option value="Famili Lain" {{ old('hubungan', $item->hubungan) == 'Famili Lain' ? 'selected' : '' }}>Famili Lain</option>
                                            <option value="Pembantu" {{ old('hubungan', $item->hubungan) == 'Pembantu' ? 'selected' : '' }}>Pembantu</option>
                                            <option value="Lainnya" {{ old('hubungan', $item->hubungan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                        @error('hubungan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('anggota-keluarga.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-times me-1"></i>Batal
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i>Update Data
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>