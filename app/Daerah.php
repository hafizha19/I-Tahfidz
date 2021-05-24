<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    protected $table = 'daerah';
    protected $fillable = [
        'id',
        'province_code',
        'kabupaten_code',
        'kecamatan_code',
        'lat',
        'long',
        'province_name',
        'kabupaten_name',
        'kecamatan_name',
    ];
}
