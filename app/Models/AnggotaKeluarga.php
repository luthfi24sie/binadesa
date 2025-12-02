<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;

    protected $table = 'anggota_keluarga';

    protected $primaryKey = 'anggota_id';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
        'kk_id',
        'warga_id',
        'hubungan',
    ];

    protected $casts = [
        'kk_id' => 'integer',
        'warga_id' => 'integer',
        'hubungan' => 'string',
    ];
}
