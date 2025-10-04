<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice; 

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $invoice = Invoice::all(); 
         return response()->json([

            'success'=> true, 
            'data'=> $invoice, 
         ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([

            'issue_date'=> 'required|date', 
            'total_number' => 'required|integer',
            'status'=> 'required|string|max:255'
        ]);

        $invoice = Invoice::create([

            'issue_date'=>$request->issue_date, 
            'total_number'=>$request->total_number, 
            'status'=>$request->status

        ]); 

        return response()->json([
            'message' => 'Invoice added successfully ', 
            'success' => true, 
            'data' => $invoice, 

        ], 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::find($id); 

        if(!$invoice){
            return response()->json([
            'success' => false,
            'message' => 'Invoice not found', 
            ], 404);
};
        return response()->json([
         'success' => true,
         'data' => $invoice,  

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
        //
    }
}
