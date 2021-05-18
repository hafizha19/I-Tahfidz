<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';
    protected $guarded = [];

    public function ponpes()
    {
        return $this->belongsTo(Ponpes::class, 'ponpes_id', 'id');
    }
    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'daerah_id', 'id');
    }
}
