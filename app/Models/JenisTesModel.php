<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisTesModel extends Model
{
    use HasFactory;

    protected $table = 'jenis_tes';
    protected $primaryKey = 'id_tes';
    protected $fillable = [
        'nama_tes',
        'deskripsi_tes',
        'biaya',
        'jasa_dokter'
    ];

    public function pemeriksaan(): HasMany
    {
        return $this->hasMany(PemeriksaanModel::class, 'id_tes');
    }
}
