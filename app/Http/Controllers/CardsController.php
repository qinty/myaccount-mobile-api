<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Card;
use App\Models\Shopper;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user    = $request->input('username');
        $shopper = Shopper::where('email', $user)->first();

        if (!empty($shopper)) {

            return response()->json(Card::where('shopper_id', $shopper->id)->get());
        } else {
            return response('{"error":"Invalid arguments"}', 500);
        }

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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $username = $request->input('username');
        $shopper  = Shopper::where('email', $username)->first();

        if (!empty($shopper)) {
            return response()->json(Card::find($id));
        } else {
            return response('{"error":"Invalid arguments"}', 500);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user    = $request->input('username');
        $shopper = Shopper::where('email', $user)->first();
        $card    = Card::find($id);
        $month   = $request->input('month');
        $year    = $request->input('year');
        $date    = strtotime($year . '-' . $month . '-01');

        $currentDate = time();
        $validDate   = $date > $currentDate;

        if (!empty($shopper) && !empty($card) && !empty($month) && !empty($year) && $validDate) {
            $card->expirationMonth = sprintf('%02d', $month);
            $card->expirationYear  = sprintf('%02d', $year);
            $card->save();
            return response()->json(Card::where('shopper_id', $shopper->id)->get());
        } else {
            return response('{"error":"Invalid arguments"}', 500);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
