<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model {
    use HasFactory;

    protected $table = 'gejala';
    protected $primaryKey = 'Kode';
    public $timestamps = false;

    public function penyakit() {
        return $this->belongsToMany(Penyakit::class, 'hubungan_gejala_penyakit', 'Kode_Gejala', 'Kode_Penyakit');
    }
}
