<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model {
    use HasFactory;

    protected $table = 'penyakit';
    protected $primaryKey = 'Kode_Penyakit';
    public $timestamps = false;

    public function gejala() {
        return $this->belongsToMany(Gejala::class, 'hubungan_gejala_penyakit', 'Kode_Penyakit', 'Kode_Gejala');
    }
}
