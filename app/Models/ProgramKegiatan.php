<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProgramKegiatan extends Model
{
    use HasRoles, HasUuids;

    protected $table = 'tb_program_kegiatan'; // ✅ beri tahu Laravel nama tabel aslinya

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'id_standar',
        'judul_program',
        'total',
        'pagu_dipa',
        'pagu_komite',
    ];

    public function standar()
    {
        return $this->belongsTo(Standar::class, 'id_standar', 'id');
        // Foreign key di tb_program_kegiatan → id_standar
        // Primary key di tb_standar → id
    }
}
