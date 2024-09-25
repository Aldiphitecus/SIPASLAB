<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PasienModel extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $fillable = [
        'kode_pasien',
        'nama_pasien',
        'alamat',
        'no_telepon',
        'tgl_lahir',
        'jenis_kelamin'
    ];

    public function pemeriksaan(): HasMany
    {
        return $this->hasMany(PemeriksaanModel::class, 'id_pasien', 'id_pasien');
    }
}
