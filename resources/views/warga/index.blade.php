<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga - Sistem Kependudukan</title>
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
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .btn-action {
            margin: 2px;
        }
        .filter-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
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
                            <h5 class="mb-0">Data Warga Desa</h5>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('warga.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i>Tambah Warga
                                </a>
                            </div>
                        </div>
                    </nav>

                    <!-- Content -->
                    <div class="p-4">
                        <!-- Alert Messages -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Filter Card -->
                        <div class="card filter-card mb-4">
                            <div class="card-body">
                                <form method="GET" action="{{ route('warga.index') }}">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Cari</label>
                                            <input type="text" name="search" class="form-control" 
                                                   placeholder="Nama, NIK, atau Alamat" 
                                                   value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select">
                                                <option value="">Semua Status</option>
                                                <option value="Warga Tetap" {{ request('status') == 'Warga Tetap' ? 'selected' : '' }}>Warga Tetap</option>
                                                <option value="Warga Sementara" {{ request('status') == 'Warga Sementara' ? 'selected' : '' }}>Warga Sementara</option>
                                                <option value="Pendatang" {{ request('status') == 'Pendatang' ? 'selected' : '' }}>Pendatang</option>
                                                <option value="Pindah Keluar" {{ request('status') == 'Pindah Keluar' ? 'selected' : '' }}>Pindah Keluar</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">RT</label>
                                            <input type="text" name="rt" class="form-control" 
                                                   placeholder="RT" value="{{ request('rt') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">RW</label>
                                            <input type="text" name="rw" class="form-control" 
                                                   placeholder="RW" value="{{ request('rw') }}">
                                        </div>
                                        <div class="col-md-3 d-flex align-items-end">
                                            <button type="submit" class="btn btn-primary me-2">
                                                <i class="fas fa-search me-1"></i>Filter
                                            </button>
                                            <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary">
                                                <i class="fas fa-refresh me-1"></i>Reset
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Data Table -->
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5 class="mb-0"><i class="fas fa-table me-2"></i>Daftar Warga Desa</h5>
                            </div>
                            <div class="card-body p-0">
                                @if($warga && $warga->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Umur</th>
                                                    <th>Alamat</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($warga as $row)
                                                    <tr>
                                                        <td>
                                                            <span class="badge bg-primary">{{ $row->nik ?? 'N/A' }}</span>
                                                        </td>
                                                        <td>
                                                            <strong>{{ $row->nama_lengkap ?? 'N/A' }}</strong>
                                                            @if($row->nama_panggilan)
                                                                <br><small class="text-muted">{{ $row->nama_panggilan }}</small>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="badge {{ $row->jenis_kelamin == 'L' ? 'bg-info' : 'bg-warning' }}">
                                                                {{ $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $row->umur ?? 'N/A' }} tahun</td>
                                                        <td>
                                                            <small>{{ $row->alamat ?? 'N/A' }}</small>
                                                            <br><span class="badge bg-secondary">RT {{ $row->rt }}/RW {{ $row->rw }}</span>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $statusClass = match($row->status_kependudukan) {
                                                                    'Warga Tetap' => 'bg-success',
                                                                    'Warga Sementara' => 'bg-warning',
                                                                    'Pendatang' => 'bg-info',
                                                                    'Pindah Keluar' => 'bg-danger',
                                                                    default => 'bg-secondary'
                                                                };
                                                            @endphp
                                                            <span class="badge {{ $statusClass }}">{{ $row->status_kependudukan ?? 'N/A' }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group">
                                                                <a href="{{ route('warga.show', $row) }}" 
                                                                   class="btn btn-sm btn-outline-info btn-action" 
                                                                   title="Lihat Detail">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="{{ route('warga.edit', $row) }}" 
                                                                   class="btn btn-sm btn-outline-warning btn-action" 
                                                                   title="Edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <form action="{{ route('warga.destroy', $row) }}" 
                                                                      method="POST" 
                                                                      class="d-inline"
                                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" 
                                                                            class="btn btn-sm btn-outline-danger btn-action" 
                                                                            title="Hapus">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    @if($warga && method_exists($warga, 'links'))
                                        <div class="card-footer bg-white">
                                            {{ $warga->links() }}
                                        </div>
                                    @endif
                                @else
                                    <div class="text-center py-5">
                                        <i class="fas fa-user fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">Belum ada data warga</h5>
                                        <p class="text-muted">Klik tombol "Tambah Warga" untuk menambahkan data pertama</p>
                                        <a href="{{ route('warga.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus me-2"></i>Tambah Data Pertama
                                        </a>
                                    </div>
                                @endif
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
