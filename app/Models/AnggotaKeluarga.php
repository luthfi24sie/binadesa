<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    protected $table = 'anggota_keluarga';

    protected $primaryKey = 'anggota_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'kk_id',
        'warga_id',
        'hubungan',
    ];

    public function kk()
    {
<<<<<<< HEAD
        return $this->belongsTo(\App\Models\Keluarga_kk::class, 'kk_id', 'kk_id');
=======
        return $this->belongsTo(Keluarga_kk::class, 'kk_id');
>>>>>>> 868c5c2281305549b0c0e6533856867fd3e5cc09
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
}
