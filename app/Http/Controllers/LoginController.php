<?php

namespace App\Http\Controllers;

use app\Api\ApiClient;
use App\Http\Requests;
use App\Models\Shopper;
use Illuminate\Http\Request;

class LoginController extends Controller
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
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = md5($request->input('password'));
        try {
            $client  = new ApiClient($username, $password);
            $shopper = Shopper::with(['country'])->where('email', $username)->first();
            if (!empty($shopper)) {
                return response()->json($shopper);
            } else {
                return response('{"error":"Invalid arguments"}', 500);
            }
        } catch (\Exception $e) {
            return response('{"error":"' . $e->getMessage() . '"}', 500);
        }

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
