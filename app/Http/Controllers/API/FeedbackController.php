<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback; 

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $feedback = Feedback::all(); 
         return response()->json([

            'success'=> true, 
            'data'=> $feedback, 
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

            'rating'=>'nullable|string|min:1|max:10', 
            'comments'=>'required|string|max:25000',  
        ]);

        $feedback = Feedback::create([

            'rating'=>$request->rating, 
            'comments'=>$request->comments, 

        ]); 

        return response()->json([
            'message' => 'Feedback added successfully ', 
            'success' => true, 
            'data' => $feedback, 

        ], 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feedback = Feedback::find($id); 

        if(!$feedback){
            return response()->json([
            'success' => false,
            'message' => 'Feedback not found', 
            ], 404);
};
        return response()->json([
         'success' => true,
         'data' => $feedback,  

        ], 200);
        
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
             'rating'=>'nullable|min:1|max:10', 
            'comments'=>'required|string|max:25000', 
        ]); 
        $feedback = Feedback::find($id); 

        if(!$feedback){
            return response()->json([
                'success' => false, 
                'message'=> 'Feedback not found', 

            ], 404);
        }

        $feedback->update([
          'rating'=>$request->rating, 
            'comments'=>$request->comments,
        ]); 

        return response->json([
            'success' => true, 
            'data' => $feedback, 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $feedback = Feedback::find($id); 
        if (!$feedback) {
            return response->json([
'success' => false,
'message' => 'Feedback not found', 
            ], 404);
        }

        $feedback->delete(); 

        return response->json([
           'success' => true, 
           'message' => 'Feedback deleted successfully', 
        ], 200);
    }
}
