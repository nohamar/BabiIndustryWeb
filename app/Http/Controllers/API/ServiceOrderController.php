<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceOrder; 

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $service_order = ServiceOrder::all(); 
         return response()->json([

            'success'=> true, 
            'data'=> $service_order, 
         ], 200); 
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
              $request->validate([
            'service_date'=>'required|date', 
            'status'=>'required|string', 
            'client_id' => 'required|exists:clients,id',
        ]);

        

        $service_order = ServiceOrder::create([

            'service_date'=>$request->service_date, 
            'status'=>$request->status, 
            'client_id' =>$request->client_id,


        ]); 

        return response()->json([
            'message' => 'Service Order added successfully ', 
            'success' => true, 
            'data' => $service_order, 

        ], 201); 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service_order = ServiceOrder::find($id); 

        if(!$service_order){
            return response()->json([
            'success' => false,
            'message' => 'Service Order not found', 
            ], 404);
            };

        return response()->json([
         'success' => true,
         'data' => $service_order,  

        ], 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
