<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Leadbyte extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'X_KEY' => config('services.leadbyte.access.leadbyte_x_key'),
        ])->post('https://icon.leadbyte.co.uk/restapi/v1.3/leads', [
            'campid' => $request->input('campid'),
            'sid' => config('services.leadbyte.access.leadbyte_sid'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone1' => $request->input('phone1'),
            'id_number' => $request->input('id_number'),
        ])->json();
    }
}
