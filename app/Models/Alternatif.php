<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $fillable = ['nama_alternatif', 'deskripsi'];

    public function nilaiAlternatifs()
    {
        return $this->hasMany(NilaiAlternatif::class);
    }
}
