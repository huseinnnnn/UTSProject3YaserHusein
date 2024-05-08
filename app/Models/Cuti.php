<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'tgl_mulai', 'tgl_selesai', 'jenis_cuti', 'keterangan'];
    protected $primaryKey = 'id_cuti';
    protected $table = 'cuti';
}
