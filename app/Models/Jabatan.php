<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jabatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jabatan';
    protected $fillable = ['nama_jabatan','gaji_pokok'];
    protected $table = 'jabatan';

    /**
     * Get all of the pegawai for the Jabatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'id_jabatan', 'id_jabatan');
    }
}
