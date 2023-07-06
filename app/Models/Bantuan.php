<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;
    protected $table = 'bantuans';
    protected $fillable = ['idPenerima','tanggal', 'jenisBantuan', 'jumlah'];

    public function penerima()
    {
        return $this->belongsTo('App\Models\Penerima', 'idPenerima');
    }
}
