<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;
    protected $table = 'penerimas';
    protected $fillable = ['nama', 'nik', 'gender','jabatan','rekening','kelurahan','alamat'];
}
