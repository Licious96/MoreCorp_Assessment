<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $message = [
            'reason.required' => 'please enter your reason',
            'date.required' => 'please choose a date'
        ];

        $validator = Validator::make($request->all(), [
            'reason' => 'required|string',
            'date' => 'required|string',
        ], $message);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $booking = new Booking([
            'user_id' => $request->user()->id,
            'reason' => $request->reason,
            'date' => $request->date,
        ]);

        $booking->save();

        return response()->json(['message' => 'Booking created successfully'], 201);
    }

    public function retrieve(Request $request){
        return response()->json(Booking::where('user_id', $request->user()->id)->get(), 200);  
    }
}
