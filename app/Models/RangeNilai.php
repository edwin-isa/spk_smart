<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangeNilai extends Model
{
    use HasFactory;

    protected $table = 'range_nilai';

    protected $fillable = ['sub_kriteria_id', 'range', 'nilai'];

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'sub_kriteria_id');
    }
}
