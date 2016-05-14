<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Shopper;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $username = $request->input('username');
        try {

            $shopper = Shopper::where('email', $username)->first();

            if (!empty($shopper)) {

                return response()->json(Subscription::where('shopper_id', $shopper->id)->get());
            } else {
                return response('{"error":"Invalid arguments"}', 500);
            }
        } catch (\Exception $e) {
            return response('{"error":"' . $e->getMessage() . '"}', 500);
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
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function show(Request $request, $id)
    {
        $username = $request->input('username');
        try {

            $shopper = Shopper::where('email', $username)->first();

            if (!empty($shopper)) {

                return response()->json(Subscription::find($id));
            } else {
                return response('{"error":"Invalid arguments"}', 500);
            }
        } catch (\Exception $e) {
            return response('{"error":"' . $e->getMessage() . '"}', 500);
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
        //
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
