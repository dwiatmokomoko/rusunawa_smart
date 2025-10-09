<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_criteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'criteria_id',
        'weight',
        'created_by',
        'updated_by',
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
