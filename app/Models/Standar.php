<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Standar extends Model
{
    use HasRoles, HasUuids;

    protected $table = 'tb_standar'; // ✅ beri tahu Laravel nama tabel aslinya

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'nama_standar',
    ];
}
