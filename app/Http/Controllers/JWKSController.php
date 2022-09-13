<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JWKSController extends Controller
{

    public function jwks(Request $request)
    {
        return response()->json(
            json_decode(
                file_get_contents(storage_path('app/public/jwks.json')),
                true
            )
        );
    }

    public function x509pem(Request $request)
    {
        $host = parse_url(config()->get('app.url'), PHP_URL_HOST);
        $host = explode('.', $host, 2)[1];

        abort_if(
            $request->header('Referer') !== "auth.$host",
            Response::HTTP_NOT_ACCEPTABLE,
            "Only auth service can access this X509 PEM file!"
        );

        return response(file_get_contents(storage_path('app/public/private.pem')));
    }

}
