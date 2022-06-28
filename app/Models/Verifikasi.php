<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function inventaris(){

        return $this->belongsTo(inventaris::class, 'id_inventaris');

    }
}
