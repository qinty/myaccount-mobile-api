<?php

namespace App\Http\Controllers;

use app\Api\ApiClient;
use App\Http\Requests;
use App\Models\Device;
use App\Models\Shopper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([]);
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
        $username = $request->header('x-auth-user');
        $password = md5($request->header('x-auth-key'));
        try {
            $client = new ApiClient($username, $password);
            $shopper     = Shopper::where('email', $username)->first();
            $deviceToken = $request->input('token');
            if (!empty($shopper) && !empty($deviceToken)) {

                $device             = new Device();
                $device->shopper_id = $shopper->id;
                $device->token      = $deviceToken;
                $device->active     = 1;
                $device->save();

                return response()->json($device->id);
            } else {
                return response('{"error":"Invalid arguments"}', 500);
            }
        } catch (\Exception $e) {
            return response('{"error":"'.$e->getMessage().'"}', 500);
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