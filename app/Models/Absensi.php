<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class absensi extends Model
{
    use HasFactory;
    protected $fillable = ['nip', 'jam_masuk', 'jam_keluar', 'tgl_absensi'];
    protected $table = 'absensi';
    protected $primaryKey = 'nip';

    public function pegawai(): BelongsTo {
        return $this->belongsTo(pegawai::class, 'nip', 'nip');
    }

}
