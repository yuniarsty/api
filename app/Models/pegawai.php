<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pegawai extends Model
{
    use HasFactory;
    public $primarykey ='id_pegawai';
    protected $fillable =[
        'nama','nip','alamat','telp','foto','id_jabatan_pgw','status'
    ];
     static function getPegawai($s=null,$tp=null){
        $return=DB::table('pegawais')
        ->where('nama','like',"%$s%")
        ->join('jabatan_pgws','pegawais.id_jabatan_pgw','=','jabatan_pgws.id_jabatan_pgw');
        return $return;
    }
}
