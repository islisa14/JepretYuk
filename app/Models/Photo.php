<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'nama_file',
        'paket',
        'frame_id'
    ];
}