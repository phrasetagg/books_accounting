<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reserve extends Model
{
    protected $fillable = [
        'renter',
        'date_start',
        'date_end',
        'quantity',
        'deposit',
        'total_price'
    ];

    public static function create(array $request)
    {
        $reserveId = DB::table('reserves')->insertGetId(
            [
                'renter' => $request['renter'],
                'date_start' => $request['date_start'],
                'date_end' => $request['date_end'],
                'quantity' => $request['quantity'],
                'deposit' => $request['deposit'],
                'total_price' => $request['total_price']
            ]
        );

        return $reserveId;
    }
}
