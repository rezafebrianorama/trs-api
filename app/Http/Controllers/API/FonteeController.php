<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FonteeRequest;
use Illuminate\Http\Request;

class FonteeController extends Controller {

    function store(FonteeRequest $request)
    {
        $request->validate([
            'num_phone' => 'required',
        ]);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('data' => '[{"target": '.$request->num_phone.', "message": "test whatsapp bot","delay":"1"}]'
        ),
        CURLOPT_HTTPHEADER => array(
        'Authorization: B_TS1tgZRVYmrJ8M5P@zY8_1@@bYf+g2GnrE_'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        // return response()->json(['msg' => 'Data created', 'data' => ''], 201);
    }

}