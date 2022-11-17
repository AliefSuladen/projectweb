<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Kelurahan extends Model
{
    public function AllData()
    {
        return DB::table('kelurahan')
            ->get();
    }
    public function InsertData($data)
    {
        DB::table('kelurahan')
            ->insert($data);
    }
    public function DetailData($id)
    {
        return DB::table('kelurahan')
            ->where('id_kelurahan', $id)->first();
    }
    public function UpdateData($id, $data)
    {
        DB::table('kelurahan')
            ->where('id_kelurahan', $id)
            ->update($data);
    }
    public function DeleteData($id)
    {
        DB::table('kelurahan')
            ->where('id_kelurahan', $id)
            ->delete();
    }
    public function AllDataPegawai()
    {
        return DB::table('pegawai')
            ->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'pegawai.id_kelurahan', 'left')
            ->get();
    }
    public function InsertDataPegawai($data)
    {
        DB::table('pegawai')
            ->insert($data);
    }
    public function DetailDataPegawai($id)
    {
        return DB::table('pegawai')
            ->join('kelurahan', 'kelurahan.id_kelurahan', '=', 'pegawai.id_kelurahan', 'left')
            ->where('id_pegawai', $id)->first();
    }
    public function UpdateDataPegawai($id, $data)
    {
        DB::table('pegawai')
            ->where('id_pegawai', $id)
            ->update($data);
    }
    public function DeleteDataPegawai($id)
    {
        DB::table('pegawai')
            ->where('id_pegawai', $id)
            ->delete();
    }
}
