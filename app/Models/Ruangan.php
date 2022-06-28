<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }
    public function inventaris()
    {
        return $this->hasMany(inventaris::class, 'id_ruangan');
    }
}
