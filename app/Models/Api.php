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
        return DB::table('events')
            ->get();
    }
}
