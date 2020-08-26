<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Reserve;

class CreateReserveJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request->all();
    }

    public function handle()
    {
        $reserveId = Reserve::create($this->request);

        return response()->json($reserveId, 201);
    }
}
