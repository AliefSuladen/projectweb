<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Api extends Model
{
    use HasFactory;
    static function getEvent()
    {
        return DB::table('berita')
            ->get();
    }
    static function getKelurahan()
    {
        return DB::table('kelurahan')
            ->get();
    }
    static function getPegawai()
    {
        return DB::table('pegawai')
            ->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'pegawai.id_kelurahan', 'left');
    }
}
