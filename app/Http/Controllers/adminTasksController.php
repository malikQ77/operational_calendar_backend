<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminTasksController extends Controller
{
    public function adminTask(Request $req)
    {

        $req->validate(
            [
                'task_name' => 'required|string',
                'task_date' => 'required',
                'task_time' => 'required',
                'users' => 'required',
            ]
        );

        $arrayID = explode(',', $req->users);
        $tokens = [];
        $i = 0;
        foreach ($arrayID as $id) {
            $user = \App\Models\User::find($id);
            $userToken = $user->device_token;
            $tokens[$i] = $userToken;
            $i++;
        }
        $SERVER_API_KEY = 'AAAABvRWCTM:APA91bGWvDx8ve5b7Bb6GnxaQTdvs_O9Ve0ndF94cecffLwqhQJUvSG0KpCIVbFVIWw6E8mZqDHiq-ARagScXZusIcwqbvdot2Tx2Ud_tMJAcG4jHfMbyIGRBqnHz1cYF9NaG7c3cWKE';
        $data = [
            "registration_ids" => $tokens,
            "notification" => [
                "title" => "New Administration Task 🤐😥",
                "body" => $req->task_name . ' At ' . $req->task_date,
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
}
