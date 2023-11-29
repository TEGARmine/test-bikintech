<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;

    protected $table = 'nilai_siswas';

    protected $fillable = [
        'nama',
        'tugas1',
        'tugas2',
        'tugas3',
        'tugas4',
        'tugas5',
        'ujian1',
        'ujian2',
        'nilai_akhir',
        'grade',
    ];
}
