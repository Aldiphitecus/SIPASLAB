<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilTesModel extends Model
{
    use HasFactory;

    protected $table = 'hasil_tes';
    protected $primaryKey = 'id_hasil';
    protected $fillable = [
        'id_pemeriksaan',
        'hasil'
    ];

    public function pemeriksaan(): BelongsTo
    {
        return $this->belongsTo(PemeriksaanModel::class, 'id_pemeriksaan');
    }
}
