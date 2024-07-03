<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class absensi extends Model
{
    use HasFactory;
    protected $fillable = ['nopeg', 'jam_masuk', 'jam_keluar', 'tgl_absensi'];
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';

    public function pegawai(): BelongsTo {
        return $this->belongsTo(pegawai::class, 'nopeg', 'nopeg');
    }

}
