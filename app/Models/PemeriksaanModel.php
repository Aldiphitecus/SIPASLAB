<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PemeriksaanModel extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';
    protected $primaryKey = 'id_pemeriksaan';
    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'id_tes',
        'tgl_pemeriksaan',
        'waktu_pemeriksaan',
        'status_pemeriksaan'
    ];

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(DokterModel::class, 'id_dokter');
    }

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(PasienModel::class, 'id_pasien', 'id_pasien');
    }

    public function hasilTes(): HasMany
    {
        return $this->hasMany(HasilTesModel::class, 'id_pemeriksaan');
    }

    public function jenisTes(): BelongsTo
    {
        return $this->belongsTo(JenisTesModel::class, 'id_tes');
    }
}
