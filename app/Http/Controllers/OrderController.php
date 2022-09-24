<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Orders::orderBy('id','ASC')->get();
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
        try {
            $order = new Orders;
            $order->Date_of_submission = $request->get('Date_of_submission');
            $order->Status = $request->get('Status');

            $order->save();

            return response()->json(['changes' => 'saved.'],200);
        } catch (\Exception $e) {
            return response()->json(['error' => '404 invalid'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $order = Orders::findOrFail($id);
            $order->Status = $request->input('Status');

            $order->update();

            return response()->json(['changes' => 'saved.'],200);
         } catch (\Exception $e) {
             return response()->json(['error' => '404 invalid'],200);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
           $order = Orders::findOrFail($id);
           $order->delete();

           return response()->json(['changes' => 'saved.'],200);
        } catch (\Exception $e) {
            return response()->json(['error' => '404 invalid'],200);
        }
    }
}
