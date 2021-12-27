<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanPgw extends Model
{
    use HasFactory;
     public $primarykey ='id_jabatan_pgw';
    protected $fillable =[
        'nama_jabatan'
    ];
}
