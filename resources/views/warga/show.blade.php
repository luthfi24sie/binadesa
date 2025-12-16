<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Warga - {{ $item->nama_lengkap }}</title>
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
        .section-title {
            color: #667eea;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0;
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
                        <a href="{{ route('warga.index') }}" class="nav-link active">
                            <i class="fas fa-user me-2"></i> Data Warga
                        </a>
                        <a href="{{ route('anggota-keluarga.index') }}" class="nav-link">
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
                            <h5 class="mb-0">Detail Warga - {{ $item->nama_lengkap }}</h5>
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ route('warga.edit', $item) }}" class="btn btn-warning">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-1"></i>Kembali
                                </a>
                            </div>
                        </div>
                    </nav>

                    <!-- Content -->
                    <div class="p-4">
                        <!-- Profile Header -->
                        <div class="card mb-4">
                            <div class="profile-header p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center">
                                        <div class="avatar-circle bg-white text-primary d-inline-flex align-items-center justify-content-center" 
                                             style="width: 80px; height: 80px; border-radius: 50%; font-size: 2rem;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="mb-1">{{ $item->nama_lengkap }}</h3>
                                        @if($item->nama_panggilan)
                                            <p class="mb-2 opacity-75">{{ $item->nama_panggilan }}</p>
                                        @endif
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-light text-dark">
                                                <i class="fas fa-id-card me-1"></i>{{ $item->nik }}
                                            </span>
                                            <span class="badge bg-light text-dark">
                                                <i class="fas fa-venus-mars me-1"></i>
                                                {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                            </span>
                                            <span class="badge bg-light text-dark">
                                                <i class="fas fa-birthday-cake me-1"></i>{{ $item->umur }} tahun
                                            </span>
                                            @php
                                                $statusClass = match($item->status_kependudukan) {
                                                    'Warga Tetap' => 'bg-success',
                                                    'Warga Sementara' => 'bg-warning',
                                                    'Pendatang' => 'bg-info',
                                                    'Pindah Keluar' => 'bg-danger',
                                                    default => 'bg-secondary'
                                                };
                                            @endphp
                                            <span class="badge {{ $statusClass }}">
                                                {{ $item->status_kependudukan }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <div class="d-flex flex-column gap-2">
                                            <a href="{{ route('warga.edit', $item) }}" class="btn btn-light btn-sm">
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </a>
                                            <form action="{{ route('warga.destroy', $item) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-light btn-sm">
                                                    <i class="fas fa-trash me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Data Pribadi -->
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <h5 class="mb-0 section-title"><i class="fas fa-user me-2"></i>Data Pribadi</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-id-card me-2"></i>NIK
                                            </div>
                                            <div class="info-value">
                                                <span class="badge bg-primary fs-6">{{ $item->nik ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-user me-2"></i>Nama Lengkap
                                            </div>
                                            <div class="info-value">{{ $item->nama_lengkap ?? 'N/A' }}</div>
                                        </div>
                                        
                                        @if($item->nama_panggilan)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-user-tag me-2"></i>Nama Panggilan
                                            </div>
                                            <div class="info-value">{{ $item->nama_panggilan }}</div>
                                        </div>
                                        @endif
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-venus-mars me-2"></i>Jenis Kelamin
                                            </div>
                                            <div class="info-value">
                                                <span class="badge {{ $item->jenis_kelamin == 'L' ? 'bg-info' : 'bg-warning' }}">
                                                    {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-map-marker-alt me-2"></i>Tempat, Tanggal Lahir
                                            </div>
                                            <div class="info-value">
                                                {{ $item->tempat_lahir ?? 'N/A' }}, 
                                                {{ $item->tanggal_lahir ? $item->tanggal_lahir->format('d F Y') : 'N/A' }}
                                            </div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-birthday-cake me-2"></i>Umur
                                            </div>
                                            <div class="info-value">{{ $item->umur ?? 'N/A' }} tahun</div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-pray me-2"></i>Agama
                                            </div>
                                            <div class="info-value">{{ $item->agama ?? 'N/A' }}</div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-ring me-2"></i>Status Perkawinan
                                            </div>
                                            <div class="info-value">{{ $item->status_perkawinan ?? 'N/A' }}</div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-graduation-cap me-2"></i>Pendidikan Terakhir
                                            </div>
                                            <div class="info-value">{{ $item->pendidikan_terakhir ?? 'N/A' }}</div>
                                        </div>
                                        
                                        @if($item->pekerjaan)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-briefcase me-2"></i>Pekerjaan
                                            </div>
                                            <div class="info-value">{{ $item->pekerjaan }}</div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Data Alamat & Kontak -->
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <h5 class="mb-0 section-title"><i class="fas fa-home me-2"></i>Alamat & Kontak</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-map-marker-alt me-2"></i>Alamat Lengkap
                                            </div>
                                            <div class="info-value">{{ $item->alamat ?? 'N/A' }}</div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-home me-2"></i>RT/RW
                                            </div>
                                            <div class="info-value">
                                                <span class="badge bg-secondary">RT {{ $item->rt ?? 'N/A' }}/RW {{ $item->rw ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-building me-2"></i>Kelurahan/Desa
                                            </div>
                                            <div class="info-value">{{ $item->kelurahan ?? 'N/A' }}</div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-city me-2"></i>Kecamatan
                                            </div>
                                            <div class="info-value">{{ $item->kecamatan ?? 'N/A' }}</div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-map me-2"></i>Kabupaten/Kota
                                            </div>
                                            <div class="info-value">{{ $item->kabupaten_kota ?? 'N/A' }}</div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-flag me-2"></i>Provinsi
                                            </div>
                                            <div class="info-value">{{ $item->provinsi ?? 'N/A' }}</div>
                                        </div>
                                        
                                        @if($item->kode_pos)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-mail-bulk me-2"></i>Kode Pos
                                            </div>
                                            <div class="info-value">{{ $item->kode_pos }}</div>
                                        </div>
                                        @endif
                                        
                                        @if($item->no_telepon)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-phone me-2"></i>No. Telepon
                                            </div>
                                            <div class="info-value">{{ $item->no_telepon }}</div>
                                        </div>
                                        @endif
                                        
                                        @if($item->email)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-envelope me-2"></i>Email
                                            </div>
                                            <div class="info-value">{{ $item->email }}</div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Informasi Tambahan -->
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <h5 class="mb-0 section-title"><i class="fas fa-info-circle me-2"></i>Informasi Tambahan</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-user-check me-2"></i>Status Kependudukan
                                            </div>
                                            <div class="info-value">
                                                <span class="badge {{ $statusClass }}">{{ $item->status_kependudukan ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        
                                        @if($item->golongan_darah)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-tint me-2"></i>Golongan Darah
                                            </div>
                                            <div class="info-value">
                                                <span class="badge bg-danger">{{ $item->golongan_darah }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-flag me-2"></i>Kewarganegaraan
                                            </div>
                                            <div class="info-value">{{ $item->kewarganegaraan ?? 'N/A' }}</div>
                                        </div>
                                        
                                        @if($item->nama_ayah)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-male me-2"></i>Nama Ayah
                                            </div>
                                            <div class="info-value">{{ $item->nama_ayah }}</div>
                                        </div>
                                        @endif
                                        
                                        @if($item->nama_ibu)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-female me-2"></i>Nama Ibu
                                            </div>
                                            <div class="info-value">{{ $item->nama_ibu }}</div>
                                        </div>
                                        @endif
                                        
                                        @if($item->tanggal_masuk)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-calendar-plus me-2"></i>Tanggal Masuk Desa
                                            </div>
                                            <div class="info-value">{{ $item->tanggal_masuk->format('d F Y') }}</div>
                                        </div>
                                        @endif
                                        
                                        @if($item->tanggal_keluar)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-calendar-minus me-2"></i>Tanggal Keluar Desa
                                            </div>
                                            <div class="info-value">{{ $item->tanggal_keluar->format('d F Y') }}</div>
                                        </div>
                                        @endif
                                        
                                        @if($item->alasan_keluar)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-info-circle me-2"></i>Alasan Keluar
                                            </div>
                                            <div class="info-value">{{ $item->alasan_keluar }}</div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Data Sistem -->
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <h5 class="mb-0 section-title"><i class="fas fa-database me-2"></i>Data Sistem</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-hashtag me-2"></i>ID Warga
                                            </div>
                                            <div class="info-value">
                                                <span class="badge bg-primary fs-6">{{ $item->warga_id ?? 'N/A' }}</span>
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
                                        
                                        @if($item->catatan)
                                        <div class="info-item">
                                            <div class="info-label">
                                                <i class="fas fa-sticky-note me-2"></i>Catatan
                                            </div>
                                            <div class="info-value">{{ $item->catatan }}</div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h6 class="mb-3">Aksi</h6>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('warga.edit', $item) }}" class="btn btn-warning">
                                                <i class="fas fa-edit me-1"></i>Edit Data
                                            </a>
                                            <form action="{{ route('warga.destroy', $item) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash me-1"></i>Hapus Data
                                                </button>
                                            </form>
                                            <a href="{{ route('warga.index') }}" class="btn btn-secondary">
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
