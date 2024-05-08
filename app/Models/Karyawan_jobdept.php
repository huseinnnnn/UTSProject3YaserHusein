<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsTo;

class Karyawan_jobdept extends Model
{
    use HasFactory;
    protected $fillable = ['id_jobdept','nip','id_dept','id_jabatan','tgl_mulai'];
    protected $table = 'karyawan_jobdept';
    protected $primarykey = 'nip';


    public function department(): BelongsTo {
        return $this->belongsTo(Department::class,'id_dept','id_dept');
    }

    public function jabatan(): BelongsTo {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

}
