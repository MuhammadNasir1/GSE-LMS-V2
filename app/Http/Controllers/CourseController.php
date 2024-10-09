<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\CourseAssignments;
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
                "name" => "required",
                "teacher" => "required",
                "qualification_number" => "required",
                "total_assignments" => "required",
                "course_assignments" => "required",
                "description" => "required",

                "assignment_importance" => "nullable|array",
                "refrence_no" => "required|array",
                "title" => "required|array",
                "credits" => "required|array",
                "progress" => "required|array",
                "progress" => "required|array",

            ]);

            $course = Course::create([
                'user_id' => session('user_det')['user_id'],
                'name' => $validatedData['name'],
                'teacher' => $validatedData['teacher'],
                'qualification_number' => $validatedData['qualification_number'],
                'total_assignments' => $validatedData['total_assignments'],
                'course_assignments' => $validatedData['course_assignments'],
                'description' => $validatedData['description'],
            ]);
            foreach ($validatedData['refrence_no'] as $i => $refrence_no) {
                // Create the assignment for each set of data
                $assignment = CourseAssignments::create([
                    'course_id' => $course->id,
                    'assignment_importance' => $validatedData['assignment_importance'][$i] ?? 0, // Use null if nullable
                    'refrence_no' => $refrence_no,
                    'title' => $validatedData['title'][$i],
                    'credits' => $validatedData['credits'][$i],
                    'progress' => $validatedData['progress'][$i],
                ]);
            }
            return response()->json(['success' => true, 'message' => "Data add successfully",  "data" => $course], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
