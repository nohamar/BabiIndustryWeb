<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment; 

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $equipments = Equipment::all(); 
         return response()->json([

            'success'=> true, 
            'data'=> $equipments, 
         ], 200); 
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([

            'name'=>'required|string|max:255', 
            'description'=>'nullable|string', 
            'serial_number'=>'required|integer|unique:equipments,serial_number', 
            'status'=>'required|string', 
        ]);

        $equipment = Equipment::create([

            'name'=>$request->name, 
            'description'=>$request->description, 
            'serial_number'=> $request->serial_number, 
            'status' =>$request->status, 

        ]); 

        return response()->json([
            'message' => 'Equipment added successfully ', 
            'success' => true, 
            'data' => $equipment, 

        ], 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $equipment = Equipment::find($id); 

        if(!$equipment){
            return response()->json([
            'success' => false,
            'message' => 'Equipment not found', 
            ], 404);
};

        return response()->json([
         'success' => true,
         'data' => $equipment,  

        ], 200);
        
      
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
             'name'=>'required|string|max:255', 
            'description'=>'nullable|string', 
            'serial_number'=>'required|integer|unique', 
            'status'=>'required|string', 
        ]); 
        $equipment = Equipment::find($id); 

        if(!$equipment){
            return response()->json([
                'success' => false, 
                'message'=> 'Equipment not found', 

            ], 404);
        }

        $equipment->update([
          'name'=>$request->name, 
            'description'=>$request->description, 
            'serial_number'=> $request->serial_number, 
            'status' =>$request->status,  
        ]); 

        return response->json([
            'success' => true, 
            'data' => $equipment, 
        ]);


      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $equipment = Equipment::find($id); 
        if (!$equipment) {
            return response->json([
'success' => false,
'message' => 'Equipment not found', 
            ], 404);
        }

        $equipment->delete(); 

        return response->json([
           'success' => true, 
           'message' => 'Equipment deleted successfully', 
        ], 200);
    }
}
