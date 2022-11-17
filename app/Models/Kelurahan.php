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
}
