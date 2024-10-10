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

        foreach ($courses as $course) {
            $course_assignment = CourseAssignments::where('course_id', $course->id)->get();
            $course->course_assignment = $course_assignment;
        }
        // return response()->json($courses);
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
                "optional" => "required",
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
                'optional' => $validatedData['optional'],
                'description' => $validatedData['description'],
            ]);
            foreach ($validatedData['refrence_no'] as $i => $refrence_no) {
                // Create the assignment for each set of data
                $assignment = CourseAssignments::create([
                    'course_id' => $course->id,
                    'optional' => $validatedData['optional'][$i] ?? 0, // Use null if nullable
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
