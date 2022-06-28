<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventaris extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

    public function verifikasi()
    {
        return $this->hasOne(Verifikasi::class, 'id_inventaris');
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y, H:i:s') . " WIB";
    }
}
