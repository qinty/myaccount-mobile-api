<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Shopper;
use Illuminate\Http\Request;

class ShopperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Shopper::with(['country', 'cards', 'subscriptions'])->get());
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $firstName  = $request->input('firstName');
        $lastName   = $request->input('lastName');
        $country_id = $request->input('country');
        $city       = $request->input('city');
        $address    = $request->input('address');

        if (!empty($shopper)) {
            if (!empty($firstName)) {
                $shopper->firstName = $firstName;
            }
            if (!empty($lastName)) {
                $shopper->lastName = $lastName;
            }
            if (!empty($country_id)) {
                $shopper->country_id = $country_id;
            }
            if (!empty($city)) {
                $shopper->city = $city;
            }
            if (!empty($address)) {
                $shopper->address = $address;
            }

            $shopper->save();

            return response()->json(Shopper::find($shopper->id));
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
