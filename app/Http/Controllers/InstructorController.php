<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;

class InstructorController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::get()->toJson(JSON_PRETTY_PRINT);
        return response($instructors, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructor = new Instructor;
        $instructor->name = $request->name;
        $instructor->save();
    
        return response()->json([
            "message" => "student record created"
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
