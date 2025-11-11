<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class UraianProgram extends Model
{
    use HasRoles, HasUuids;

    protected $table = 'tb_uraian_program'; // ✅ beri tahu Laravel nama tabel aslinya

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'id_standar',
        'judul_program',
        'id_program_kegiatan',
        'nama_uraian',
        'banyaknya',
        'satuan',
        'jumlah',
    ];
}
