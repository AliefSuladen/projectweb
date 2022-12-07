<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    public function AllData()
    {
        return DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori', 'left')
            ->get();
    }
    public function InsertData($data)
    {
        DB::table('berita')
            ->insert($data);
    }
    public function DetailData($id)
    {
        return DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori', 'left')
            ->where('id', $id)->first();
    }
    public function UpdateData($id, $data)
    {
        DB::table('berita')
            ->where('id', $id)
            ->update($data);
    }
    public function DeleteData($id)
    {
        DB::table('berita')
            ->where('id', $id)
            ->delete();
    }

    public function AllDataKategori()
    {
        return DB::table('kategori')
            ->get();
    }
    public function InsertDataKategori($data)
    {
        DB::table('kategori')
            ->insert($data);
    }
    public function DeleteDataKategori($id)
    {
        DB::table('kategori')
            ->where('id_kategori', $id)
            ->delete();
    }

    public function AllDataNope()
    {
        return DB::table('nope')
            ->get();
    }
    public function InsertDataNope($data)
    {
        DB::table('nope')
            ->insert($data);
    }
    public function DeleteDataNope($id)
    {
        DB::table('nope')
            ->where('id', $id)
            ->delete();
    }
}
