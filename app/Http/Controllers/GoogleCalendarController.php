<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Calendar;

class GoogleCalendarController extends Controller
{
    private function client()
    {
        $client = new Client();
        $client->setClientId(config('google.client_id'));
        $client->setClientSecret(config('google.client_secret'));
        $client->setRedirectUri(config('google.redirect_uri'));
        $client->addScope(Calendar::CALENDAR);
        $client->setAccessType('offline');
        return $client;
    }

    public function redirect()
    {
        return redirect($this->client()->createAuthUrl());
    }

    public function callback(Request $request)
    {
        $client = $this->client();
        $token = $client->fetchAccessTokenWithAuthCode($request->code);

        session(['google_token' => $token]);

        return redirect('/opportunities');
    }
}

