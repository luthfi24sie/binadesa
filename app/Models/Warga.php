<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';
    protected $primaryKey = 'warga_id';

    protected $fillable = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
    ];

    public function kepalaKeluarga()
    {
        return $this->hasOne(KeluargaKK::class, 'kepala_keluarga_warga_id');
    }

    public function anggotaKeluarga()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'warga_id');
    }

    public function kelahiran()
    {
        return $this->hasOne(PeristiwaKelahiran::class, 'warga_id');
    }

    public function kematian()
    {
        return $this->hasOne(PeristiwaKematian::class, 'warga_id');
    }

    public function pindah()
    {
        return $this->hasOne(PeristiwaPindah::class, 'warga_id');
    }
}
