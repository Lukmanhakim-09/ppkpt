<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{

    protected $fillable = [
        'user_id',
        'kode_aduan',
        'nama_pelapor',
        'alamat_pelapor',
        'pernyataan_pelapor',
        'email_pelapor',
        'phone_pelapor',
        'hubungi',
        'nama_korban',
        'jenis_kelamin_korban',
        'alamat_korban',
        'phone_korban',
        'status_korban',
        'nama_terlapor',
        'jenis_kelamin_terlapor',
        'alamat_terlapor',
        'phone_terlapor',
        'status_terlapor',
        'karakteristik_terlapor',
        'terlapor',
        'warning',
        'warning_detail',
        'tanggal_peristiwa',
        'category',
        'chronology',
        'bukti_pelaporan',
        'lokasi',
        'icon',
        'prioritas',
        'peringkat',
        'nilai'
    ];

    protected $casts = [
        'tanggal_peristiwa' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class)->orderBy('created_at', 'asc');
    }

    public function investigation()
    {
        return $this->hasOne(Investigation::class, 'kode_aduan', 'kode_aduan');
    }
    
    public function alternatif()
    {
        return $this->hasOne(Alternatif::class, 'aduan_id', 'id');
    }

}
