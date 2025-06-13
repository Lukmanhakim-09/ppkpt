<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable = [
        'judul',
        'deskripsi',
        'status',
    ];

    public function aduan()
    {
        return $this->belongsTo(Aduan::class);
    }
}
