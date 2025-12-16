<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Anggota Keluarga - Sistem Kependudukan</title>
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
        .info-item {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .info-value {
            font-size: 1.1rem;
            color: #212529;
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
                            <h5 class="mb-0">Detail Anggota Keluarga</h5>
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ route('anggota-keluarga.edit', $item) }}" class="btn btn-warning">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <a href="{{ route('anggota-keluarga.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-1"></i>Kembali
                                </a>
                            </div>
                        </div>
                    </nav>

                    <!-- Content -->
                    <div class="p-4">
                        <!-- Detail Card -->
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informasi Anggota Keluarga</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-hashtag me-2"></i>ID Anggota
                                    </div>
                                    <div class="info-value">
                                        <span class="badge bg-primary fs-6">{{ $item->anggota_id ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-home me-2"></i>KK ID
                                    </div>
                                    <div class="info-value">
                                        {{ $item->kk_id ?? 'N/A' }}
                                    </div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-user me-2"></i>Warga ID
                                    </div>
                                    <div class="info-value">
                                        {{ $item->warga_id ?? 'N/A' }}
                                    </div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-heart me-2"></i>Hubungan
                                    </div>
                                    <div class="info-value">
                                        <span class="badge bg-info fs-6">{{ $item->hubungan ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-calendar-plus me-2"></i>Tanggal Dibuat
                                    </div>
                                    <div class="info-value">
                                        {{ $item->created_at ? $item->created_at->format('d F Y, H:i') : 'N/A' }}
                                    </div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-calendar-edit me-2"></i>Terakhir Diupdate
                                    </div>
                                    <div class="info-value">
                                        {{ $item->updated_at ? $item->updated_at->format('d F Y, H:i') : 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h6 class="mb-3">Aksi</h6>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('anggota-keluarga.edit', $item) }}" class="btn btn-warning">
                                                <i class="fas fa-edit me-1"></i>Edit Data
                                            </a>
                                            <form action="{{ route('anggota-keluarga.destroy', $item) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash me-1"></i>Hapus Data
                                                </button>
                                            </form>
                                            <a href="{{ route('anggota-keluarga.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-list me-1"></i>Lihat Semua
                                            </a>
                                        </div>
                                    </div>
                                </div>
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