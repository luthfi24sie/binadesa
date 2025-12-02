<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'bukti_media';
    protected $fillable = ['model', 'model_id', 'file_path'];
}

