<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationCollection;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return new ReservationCollection($reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required',
            'reservation_date' => 'required|date',
            'customer_id' => 'required'

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $reservation = Reservation::create([
            'ticket_id' => $request->ticket_id,
            'reservation_date' => $request->reservation_date,
            'user_id' => Auth::user()->id,
            'customer_id' => $request->customer_id
        ]);

        return response()->json(['New reservation set.', new ReservationResource($reservation)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required',
            'reservation_date' => 'required|date',
            'customer_id' => 'required'

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $reservation->ticket_id = $request->ticket_id;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->customer_id = $request->customer_id;

        $reservation->save();

        return response()->json(['Reservation details successfully updated.', new ReservationResource($reservation)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json('Reservation calnceled.');
    }
}
