<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function store(Request $request)
    {

        $request->validate(
            [
                'user_id' => 'required|integer',
                'reminder_name' => 'required|string',
                'reminder_date' => 'required',
                'reminder_time' => 'required',
            ]
        );

        $reminder = new Reminder();
        $reminder->create(
            $request->all()
        );

        return [
            'success' => true,
            'data' => $request->all(),
        ];
    }

    public function getUserReminders(Request $request){

        $reminders = Reminder::where('user_id', $request->id)->get();
        return $reminders;
    }
}
