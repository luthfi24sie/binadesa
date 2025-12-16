<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Warga - Sistem Kependudukan</title>
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
        .section-title {
            color: #667eea;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
            margin-bottom: 20px;
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
                            <h5 class="mb-0">Edit Data Warga - {{ $item->nama_lengkap }}</h5>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary">
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
                        <form action="{{ route('warga.update', $item) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <!-- Data Pribadi -->
                            <div class="card mb-4">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0 section-title"><i class="fas fa-user me-2"></i>Data Pribadi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nik" class="form-label">
                                                <i class="fas fa-id-card me-1"></i>NIK <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('nik') is-invalid @enderror" 
                                                   id="nik" 
                                                   name="nik" 
                                                   value="{{ old('nik', $item->nik) }}" 
                                                   placeholder="16 digit NIK"
                                                   maxlength="16"
                                                   required>
                                            @error('nik')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="nama_lengkap" class="form-label">
                                                <i class="fas fa-user me-1"></i>Nama Lengkap <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                                   id="nama_lengkap" 
                                                   name="nama_lengkap" 
                                                   value="{{ old('nama_lengkap', $item->nama_lengkap) }}" 
                                                   placeholder="Nama lengkap sesuai KTP"
                                                   required>
                                            @error('nama_lengkap')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nama_panggilan" class="form-label">
                                                <i class="fas fa-user-tag me-1"></i>Nama Panggilan
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('nama_panggilan') is-invalid @enderror" 
                                                   id="nama_panggilan" 
                                                   name="nama_panggilan" 
                                                   value="{{ old('nama_panggilan', $item->nama_panggilan) }}" 
                                                   placeholder="Nama panggilan">
                                            @error('nama_panggilan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="jenis_kelamin" class="form-label">
                                                <i class="fas fa-venus-mars me-1"></i>Jenis Kelamin <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                                    id="jenis_kelamin" 
                                                    name="jenis_kelamin" 
                                                    required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L" {{ old('jenis_kelamin', $item->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="P" {{ old('jenis_kelamin', $item->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="tempat_lahir" class="form-label">
                                                <i class="fas fa-map-marker-alt me-1"></i>Tempat Lahir <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                                   id="tempat_lahir" 
                                                   name="tempat_lahir" 
                                                   value="{{ old('tempat_lahir', $item->tempat_lahir) }}" 
                                                   placeholder="Tempat lahir"
                                                   required>
                                            @error('tempat_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="tanggal_lahir" class="form-label">
                                                <i class="fas fa-calendar me-1"></i>Tanggal Lahir <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" 
                                                   class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                                   id="tanggal_lahir" 
                                                   name="tanggal_lahir" 
                                                   value="{{ old('tanggal_lahir', $item->tanggal_lahir?->format('Y-m-d')) }}" 
                                                   required>
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Agama & Status -->
                            <div class="card mb-4">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0 section-title"><i class="fas fa-heart me-2"></i>Agama & Status</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="agama" class="form-label">
                                                <i class="fas fa-pray me-1"></i>Agama <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select @error('agama') is-invalid @enderror" 
                                                    id="agama" 
                                                    name="agama" 
                                                    required>
                                                <option value="">Pilih Agama</option>
                                                <option value="Islam" {{ old('agama', $item->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="Kristen" {{ old('agama', $item->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                <option value="Katolik" {{ old('agama', $item->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                <option value="Hindu" {{ old('agama', $item->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="Budha" {{ old('agama', $item->agama) == 'Budha' ? 'selected' : '' }}>Budha</option>
                                                <option value="Konghucu" {{ old('agama', $item->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                                <option value="Lainnya" {{ old('agama', $item->agama) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                            @error('agama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="status_perkawinan" class="form-label">
                                                <i class="fas fa-ring me-1"></i>Status Perkawinan <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select @error('status_perkawinan') is-invalid @enderror" 
                                                    id="status_perkawinan" 
                                                    name="status_perkawinan" 
                                                    required>
                                                <option value="">Pilih Status Perkawinan</option>
                                                <option value="Belum Kawin" {{ old('status_perkawinan', $item->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                                <option value="Kawin" {{ old('status_perkawinan', $item->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                                <option value="Cerai Hidup" {{ old('status_perkawinan', $item->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                                <option value="Cerai Mati" {{ old('status_perkawinan', $item->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                            </select>
                                            @error('status_perkawinan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="pendidikan_terakhir" class="form-label">
                                                <i class="fas fa-graduation-cap me-1"></i>Pendidikan Terakhir <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select @error('pendidikan_terakhir') is-invalid @enderror" 
                                                    id="pendidikan_terakhir" 
                                                    name="pendidikan_terakhir" 
                                                    required>
                                                <option value="">Pilih Pendidikan</option>
                                                <option value="Tidak/Belum Sekolah" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
                                                <option value="Tidak Tamat SD/Sederajat" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'Tidak Tamat SD/Sederajat' ? 'selected' : '' }}>Tidak Tamat SD/Sederajat</option>
                                                <option value="Tamat SD/Sederajat" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'Tamat SD/Sederajat' ? 'selected' : '' }}>Tamat SD/Sederajat</option>
                                                <option value="SLTP/Sederajat" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'SLTP/Sederajat' ? 'selected' : '' }}>SLTP/Sederajat</option>
                                                <option value="SLTA/Sederajat" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'SLTA/Sederajat' ? 'selected' : '' }}>SLTA/Sederajat</option>
                                                <option value="Diploma I/II" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'Diploma I/II' ? 'selected' : '' }}>Diploma I/II</option>
                                                <option value="Akademi/Diploma III/S.Muda" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'Akademi/Diploma III/S.Muda' ? 'selected' : '' }}>Akademi/Diploma III/S.Muda</option>
                                                <option value="Diploma IV/Strata I" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'Diploma IV/Strata I' ? 'selected' : '' }}>Diploma IV/Strata I</option>
                                                <option value="Strata II" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'Strata II' ? 'selected' : '' }}>Strata II</option>
                                                <option value="Strata III" {{ old('pendidikan_terakhir', $item->pendidikan_terakhir) == 'Strata III' ? 'selected' : '' }}>Strata III</option>
                                            </select>
                                            @error('pendidikan_terakhir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="pekerjaan" class="form-label">
                                                <i class="fas fa-briefcase me-1"></i>Pekerjaan
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('pekerjaan') is-invalid @enderror" 
                                                   id="pekerjaan" 
                                                   name="pekerjaan" 
                                                   value="{{ old('pekerjaan', $item->pekerjaan) }}" 
                                                   placeholder="Pekerjaan saat ini">
                                            @error('pekerjaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Alamat -->
                            <div class="card mb-4">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0 section-title"><i class="fas fa-home me-2"></i>Data Alamat</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="alamat" class="form-label">
                                                <i class="fas fa-map-marker-alt me-1"></i>Alamat Lengkap <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                                      id="alamat" 
                                                      name="alamat" 
                                                      rows="3" 
                                                      placeholder="Alamat lengkap tempat tinggal"
                                                      required>{{ old('alamat', $item->alamat) }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="rt" class="form-label">RT <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('rt') is-invalid @enderror" 
                                                   id="rt" 
                                                   name="rt" 
                                                   value="{{ old('rt', $item->rt) }}" 
                                                   placeholder="RT"
                                                   required>
                                            @error('rt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-3 mb-3">
                                            <label for="rw" class="form-label">RW <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('rw') is-invalid @enderror" 
                                                   id="rw" 
                                                   name="rw" 
                                                   value="{{ old('rw', $item->rw) }}" 
                                                   placeholder="RW"
                                                   required>
                                            @error('rw')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="kelurahan" class="form-label">Kelurahan/Desa <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('kelurahan') is-invalid @enderror" 
                                                   id="kelurahan" 
                                                   name="kelurahan" 
                                                   value="{{ old('kelurahan', $item->kelurahan) }}" 
                                                   placeholder="Nama kelurahan/desa"
                                                   required>
                                            @error('kelurahan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('kecamatan') is-invalid @enderror" 
                                                   id="kecamatan" 
                                                   name="kecamatan" 
                                                   value="{{ old('kecamatan', $item->kecamatan) }}" 
                                                   placeholder="Nama kecamatan"
                                                   required>
                                            @error('kecamatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label for="kabupaten_kota" class="form-label">Kabupaten/Kota <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('kabupaten_kota') is-invalid @enderror" 
                                                   id="kabupaten_kota" 
                                                   name="kabupaten_kota" 
                                                   value="{{ old('kabupaten_kota', $item->kabupaten_kota) }}" 
                                                   placeholder="Nama kabupaten/kota"
                                                   required>
                                            @error('kabupaten_kota')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label for="provinsi" class="form-label">Provinsi <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('provinsi') is-invalid @enderror" 
                                                   id="provinsi" 
                                                   name="provinsi" 
                                                   value="{{ old('provinsi', $item->provinsi) }}" 
                                                   placeholder="Nama provinsi"
                                                   required>
                                            @error('provinsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="kode_pos" class="form-label">Kode Pos</label>
                                            <input type="text" 
                                                   class="form-control @error('kode_pos') is-invalid @enderror" 
                                                   id="kode_pos" 
                                                   name="kode_pos" 
                                                   value="{{ old('kode_pos', $item->kode_pos) }}" 
                                                   placeholder="Kode pos">
                                            @error('kode_pos')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="status_kependudukan" class="form-label">
                                                <i class="fas fa-user-check me-1"></i>Status Kependudukan <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select @error('status_kependudukan') is-invalid @enderror" 
                                                    id="status_kependudukan" 
                                                    name="status_kependudukan" 
                                                    required>
                                                <option value="">Pilih Status</option>
                                                <option value="Warga Tetap" {{ old('status_kependudukan', $item->status_kependudukan) == 'Warga Tetap' ? 'selected' : '' }}>Warga Tetap</option>
                                                <option value="Warga Sementara" {{ old('status_kependudukan', $item->status_kependudukan) == 'Warga Sementara' ? 'selected' : '' }}>Warga Sementara</option>
                                                <option value="Pendatang" {{ old('status_kependudukan', $item->status_kependudukan) == 'Pendatang' ? 'selected' : '' }}>Pendatang</option>
                                                <option value="Pindah Keluar" {{ old('status_kependudukan', $item->status_kependudukan) == 'Pindah Keluar' ? 'selected' : '' }}>Pindah Keluar</option>
                                            </select>
                                            @error('status_kependudukan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Kontak & Lainnya -->
                            <div class="card mb-4">
                                <div class="card-header bg-white">
                                    <h5 class="mb-0 section-title"><i class="fas fa-phone me-2"></i>Kontak & Informasi Lainnya</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="no_telepon" class="form-label">
                                                <i class="fas fa-phone me-1"></i>No. Telepon
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('no_telepon') is-invalid @enderror" 
                                                   id="no_telepon" 
                                                   name="no_telepon" 
                                                   value="{{ old('no_telepon', $item->no_telepon) }}" 
                                                   placeholder="Nomor telepon/HP">
                                            @error('no_telepon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">
                                                <i class="fas fa-envelope me-1"></i>Email
                                            </label>
                                            <input type="email" 
                                                   class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" 
                                                   name="email" 
                                                   value="{{ old('email', $item->email) }}" 
                                                   placeholder="Alamat email">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="golongan_darah" class="form-label">
                                                <i class="fas fa-tint me-1"></i>Golongan Darah
                                            </label>
                                            <select class="form-select @error('golongan_darah') is-invalid @enderror" 
                                                    id="golongan_darah" 
                                                    name="golongan_darah">
                                                <option value="">Pilih Golongan Darah</option>
                                                <option value="A" {{ old('golongan_darah', $item->golongan_darah) == 'A' ? 'selected' : '' }}>A</option>
                                                <option value="B" {{ old('golongan_darah', $item->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
                                                <option value="AB" {{ old('golongan_darah', $item->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                                                <option value="O" {{ old('golongan_darah', $item->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
                                            </select>
                                            @error('golongan_darah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="kewarganegaraan" class="form-label">
                                                <i class="fas fa-flag me-1"></i>Kewarganegaraan <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('kewarganegaraan') is-invalid @enderror" 
                                                   id="kewarganegaraan" 
                                                   name="kewarganegaraan" 
                                                   value="{{ old('kewarganegaraan', $item->kewarganegaraan) }}" 
                                                   placeholder="Kewarganegaraan"
                                                   required>
                                            @error('kewarganegaraan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nama_ayah" class="form-label">
                                                <i class="fas fa-male me-1"></i>Nama Ayah
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('nama_ayah') is-invalid @enderror" 
                                                   id="nama_ayah" 
                                                   name="nama_ayah" 
                                                   value="{{ old('nama_ayah', $item->nama_ayah) }}" 
                                                   placeholder="Nama ayah kandung">
                                            @error('nama_ayah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="nama_ibu" class="form-label">
                                                <i class="fas fa-female me-1"></i>Nama Ibu
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('nama_ibu') is-invalid @enderror" 
                                                   id="nama_ibu" 
                                                   name="nama_ibu" 
                                                   value="{{ old('nama_ibu', $item->nama_ibu) }}" 
                                                   placeholder="Nama ibu kandung">
                                            @error('nama_ibu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="tanggal_masuk" class="form-label">
                                                <i class="fas fa-calendar-plus me-1"></i>Tanggal Masuk Desa
                                            </label>
                                            <input type="date" 
                                                   class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                                                   id="tanggal_masuk" 
                                                   name="tanggal_masuk" 
                                                   value="{{ old('tanggal_masuk', $item->tanggal_masuk?->format('Y-m-d')) }}">
                                            @error('tanggal_masuk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="tanggal_keluar" class="form-label">
                                                <i class="fas fa-calendar-minus me-1"></i>Tanggal Keluar Desa
                                            </label>
                                            <input type="date" 
                                                   class="form-control @error('tanggal_keluar') is-invalid @enderror" 
                                                   id="tanggal_keluar" 
                                                   name="tanggal_keluar" 
                                                   value="{{ old('tanggal_keluar', $item->tanggal_keluar?->format('Y-m-d')) }}">
                                            @error('tanggal_keluar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="alasan_keluar" class="form-label">
                                                <i class="fas fa-info-circle me-1"></i>Alasan Keluar
                                            </label>
                                            <input type="text" 
                                                   class="form-control @error('alasan_keluar') is-invalid @enderror" 
                                                   id="alasan_keluar" 
                                                   name="alasan_keluar" 
                                                   value="{{ old('alasan_keluar', $item->alasan_keluar) }}" 
                                                   placeholder="Alasan keluar dari desa">
                                            @error('alasan_keluar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="catatan" class="form-label">
                                                <i class="fas fa-sticky-note me-1"></i>Catatan
                                            </label>
                                            <textarea class="form-control @error('catatan') is-invalid @enderror" 
                                                      id="catatan" 
                                                      name="catatan" 
                                                      rows="3" 
                                                      placeholder="Catatan khusus (opsional)">{{ old('catatan', $item->catatan) }}</textarea>
                                            @error('catatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('warga.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Update Data Warga
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Format NIK input
        document.getElementById('nik').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        
        // Format telepon input
        document.getElementById('no_telepon').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9+]/g, '');
        });
    </script>
</body>
</html>
