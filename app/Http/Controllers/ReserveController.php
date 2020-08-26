<?php

namespace App\Http\Controllers;

use App\Reserve;
use Illuminate\Http\Request;
use App\Jobs\CreateReserveJob;

class ReserveController extends Controller
{
    //Получение всех броней
    public function index()
    {
        $reserves =  Reserve::orderBy('id', 'DESC')->get();

        return response()->json($reserves, 200);
    }

    public function store(Request $request)
    {
        CreateReserveJob::dispatch($request)->onQueue('CreatingReserves');
        return response()->json("Success",201);
    }
}
