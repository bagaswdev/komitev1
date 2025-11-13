<?php

namespace App\Models;

use App\Models\Standar;
use App\Models\PaguTahunAnggaran;
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
        // 'total',
        'pagu_dipa',
        'pagu_komite',
    ];

    public function standar()
    {
        return $this->belongsTo(Standar::class, 'id_standar', 'id');
        // Foreign key di tb_program_kegiatan → id_standar
        // Primary key di tb_standar → id
    }


    public function uraianProgram()
    {
        return $this->hasMany(UraianProgram::class, 'id_program_kegiatan');
    }

    // ✅ Tambahkan hook untuk update total otomatis
    protected static function booted()
    {
        static::saved(function ($program) {
            $program->hitungTotalUraian();
        });

        static::deleted(function ($program) {
            $program->hitungTotalUraian();
        });

        static::creating(function ($program) {
            // ambil tahun anggaran aktif dari DB
            $pagu = PaguTahunAnggaran::where('status_aktif', 1)->first();
            if ($pagu) {
                $program->fk_id_pagu_tahun_anggaran = $pagu->id;
            }
        });
    }

    public function hitungTotalUraian(): void
    {
        $this->total = $this->uraianProgram()->sum('jumlah');
        $this->saveQuietly();
    }


    // Penjelasan:
    // saved() jalan setelah program dibuat/diupdate.
    // deleted() jalan kalau program dihapus (opsional).
    // updateQuietly() biar tidak men-trigger event saved lagi (mencegah loop).
    // Fungsi hitungTotalUraian() ngambil semua uraian terkait lalu sum('jumlah').





}
