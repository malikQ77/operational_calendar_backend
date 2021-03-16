<?php

namespace App\Http\Controllers;

use App\Models\PushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PushNotificationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $push_notifications = PushNotification::orderBy('created_at', 'desc')->get();
        return view('notification.index', compact('push_notifications'));
    }

    public function bulksend(Request $req)
    {

        $comment = new PushNotification();
        $comment->title = $req->input('title');
        $comment->body = $req->input('body');
        $comment->save();

        $firebaseToken = 'cGuHHHG5RaC2hPiLrMTL5l:APA91bGqiRmoZn8lt7jML1YsN7fAKmHr17eKzpc_Sjal3Ywy2OoqkcTTlLpQo8rS7NQ-LzaPmwvgibd1gjRUtktEcx-o0FXM73ukuFcdbiG0HjR6ndOBXWtdzCd-B5Mzh7k7B4iIM-Ph';

        $tokens = [];
        $SERVER_API_KEY = 'AAAABvRWCTM:APA91bGWvDx8ve5b7Bb6GnxaQTdvs_O9Ve0ndF94cecffLwqhQJUvSG0KpCIVbFVIWw6E8mZqDHiq-ARagScXZusIcwqbvdot2Tx2Ud_tMJAcG4jHfMbyIGRBqnHz1cYF9NaG7c3cWKE';
        $usersTokens = \App\Models\User::all('device_token')->toArray();
        for ($i = 0; $i < count($usersTokens); $i++) {
            $tokens[$i] = $usersTokens[$i]['device_token'];
        }
        $data = [
             "registration_ids" => $tokens,
            "notification" => [
                "title" => $req->title,
                "body" => $req->body,
            ],
            'priority' => 'high'
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('not');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PushNotification $pushNotification
     * @return \Illuminate\Http\Response
     */
    public function destroy(PushNotification $pushNotification)
    {
        //
    }
}
