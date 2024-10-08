<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course', compact('courses'));
    }

    public function insert(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'total_assignments' => 'required',
                'description' => 'required',


            ]);
            $course = Course::create([

                'name' => $validatedData['name'],
                'total_assignments' => $validatedData['total_assignments'],
                'description' => $validatedData['description'],
            ]);
            return response()->json(['success' => true, 'message' => "Data add successfully",  "data" => $course], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
