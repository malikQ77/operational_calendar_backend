<?php

namespace App\Http\Controllers;

use App\Models\Dates;
use App\Models\Response;
use App\Models\User;
use App\TokenStore\TokenCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Microsoft\Graph\Graph;

class MainController extends Controller
{
    public function index()
    {
        $hol_dates = Dates::where('type', 'Holidays')->get();
        $resc_dates = Dates::where('type', 'Rescheduled days off')->get();
        $hol_count = count($hol_dates);
        $resc_count = count($resc_dates);
        $numberRe = Response::first()->number;
        $users = User::all();
        $success = '';
        return view('welcome', compact('users' , 'hol_dates','success' ,  'resc_dates' , 'hol_count' , 'resc_count' , 'numberRe'));
    }

    public function create()
    {
        return view('addDate');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'date' => 'required|date',
                'H_date' => 'required|date',
                'type' => 'required|string',
            ]
        );

        $dates = new Dates();
        $dates->create(
            $request->all()
        );

        return redirect('/');
    }

    public function update(Request $request, $id)
    {

        $request['id'] = $id;

        Validator::make($request->all(), [
            'id' => 'required|exists:dates,id',
            'date' => 'required|date',
            'H_date' => 'required|date',
            'type' => 'required|string',
        ])->validate();

        $date = Dates::find($id);
        $date->update($request->all());
        return back();

    }
    public function destroy(Request $request, $id)
    {

        $date = Dates::find($id);
        $date->delete();
        return back();

    }

    public function getDates(Request $request){
        Response::where('id', 1)
            ->update([
                'number'=> DB::raw('number+1')
            ]);

        return Dates::all();
    }

}




//App secret = zlI17?+}lqbjyWMXBOK083#
//App Name = My PHP App
//App ID or Client ID = e9ae5c38-3143-4a64-b287-46c641763c79
