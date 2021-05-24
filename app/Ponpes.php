<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponpes extends Model
{
    protected $table = 'ponpes';
    protected $guarded = [];

    public function santri()
    {
        return $this->hasMany(Santri::class, 'ponpes_id', 'id');
    }

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'daerah_id', 'id');
    }
}
