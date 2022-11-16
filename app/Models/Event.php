<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    public function AllData()
    {
        return DB::table('events')
            ->get();
    }
    public function InsertData($data)
    {
        DB::table('events')
            ->insert($data);
    }
    public function DetailData($id)
    {
        return DB::table('events')
            ->where('id', $id)->first();
    }
    public function UpdateData($id, $data)
    {
        DB::table('events')
            ->where('id', $id)
            ->update($data);
    }
    public function DeleteData($id)
    {
        DB::table('events')
            ->where('id', $id)
            ->delete();
    }
}
