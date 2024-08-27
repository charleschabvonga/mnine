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
        
        if (substr($request->input('phone1'), 0, 1) !== '0') {
            $phone = '0'.$request->input('phone1');
        } else {
            $phone = $request->input('phone1');
        }

        if ($request->input('sid')) {
            $sid = $request->input('sid');
        } else {
            $sid = config('services.leadbyte.access.leadbyte_sid');
        }

        if ($request->input('x_key')) {
            $x_key = $request->input('x_key');
        } else {
            config('services.leadbyte.access.leadbyte_x_key');
        }

        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'X_KEY' => $x_key,
        ])->post('https://icon.leadbyte.co.uk/restapi/v1.3/leads', [
            'campid' => $request->input('campid'),
            'sid' => $sid,
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'phone1' => $phone,
            'id_number' => $request->input('id_number'),
            'comments' => $request->input('comments'),
            'email' => $request->input('email'),
            'optindate' => $request->input('optindate'),
        ])->json();
    }
}
