<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MaintenanceSchedule; 

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $schedule = MaintenanceSchedule::all(); 
         return response()->json([

            'success'=> true, 
            'data'=> $schedule, 
         ], 200); 

    }

   

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
       
        $request->validate([
            'maintenance_date'=>'required|date', 
            'type'=>'required|string', 
            'equipment_id' => 'required|exists:equipments,id',
        ]);

        $schedule = MaintenanceSchedule::create([

            'maintenance_date'=>$request->maintenance_date, 
            'type'=>$request->type, 
              'equipment_id' => $request->equipment_id,

        ]); 

        return response()->json([
            'message' => 'Maintennace Schedule added successfully ', 
            'success' => true, 
            'data' => $schedule, 

        ], 201); 

    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schedule = MaintenanceSchedule::find($id); 

        if(!$schedule){
            return response()->json([
            'success' => false,
            'message' => 'Maintenance Schedule not found', 
            ], 404);
};
        return response()->json([
         'success' => true,
         'data' => $schedule,  

        ], 200);
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $schedule = MaintenanceSchedule::find($id); 
        if (!$schedule) {
            return response()->json([
'success' => false,
'message' => 'Maintenance Schedule not found', 
            ], 404);
        }

        $schedule->delete(); 

        return response()->json([
           'success' => true, 
           'message' => 'Maintenace schedule deleted successfully', 
        ], 200);
    }
}
