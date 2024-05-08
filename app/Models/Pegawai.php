<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = ['nip','nama','alamat','tgl_lahir','email', 'j_kelamin','id_jabatan','id_dept'];
    protected $table ='pegawai';
    protected $primaryKey ='nip';

    public function jabatan(): BelongsTo {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }
    public function department(): BelongsTo {
        return $this->belongsTo(Department::class,'id_dept','id_dept');
    }
}
