<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\CourseAssignments;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $assessors = User::Select('name', 'id')->where('role', 'assessor')->get();
        $role = session('user_det')['role'];
        $user_id = session('user_det')['user_id'];
        foreach ($courses as $course) {
            // $course_assignment = CourseAssignments::where('course_id', $course->id)->get();
            // $course->course_assignment = $course_assignment;
            $course->enrolled_course = 0;
            if ($role == 'student') {
                $student = User::select('course')->where('id', $user_id)->first();
                $course->enrolled_course  = $student;
            }
        }

        // return response()->json($courses);
        return view('course', compact('courses', 'assessors'));
    }

    public function insert(Request $request)
    {
        // return response()->json($request);
        try {
            $validatedData = $request->validate([
                "name" => "required",
                "assessor_id" => "required",
                "qualification_number" => "required",
                "total_assignments" => "required",
                "description" => "required",

                "mandatory_assignments" => "required",
                "optional_assignments" => "required",
                "option_selected" => "required",

                "optional" => "required|array",
                // "assignment_importance" => "nullable|array",
                "refrence_no" => "required|array",
                "title" => "required|array",
                "credits" => "required|array",
                "progress" => "required|array",

            ]);

            $course = Course::create([
                'user_id' => session('user_det')['user_id'],
                'name' => $validatedData['name'],
                'assessor_id' => $validatedData['assessor_id'],
                'qualification_number' => $validatedData['qualification_number'],
                'total_assignments' => $validatedData['total_assignments'],
                // 'optional' => $validatedData['optional'],
                'description' => $validatedData['description'],

                'mandatory_assignments' => $validatedData['mandatory_assignments'],
                'optional_assignments' => $validatedData['optional_assignments'],
                'option_selected' => $validatedData['option_selected'],
                'course_assignments' => 7,
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

    public function getSingleCourse($course_id)
    {

        try {
            $courses = Course::find($course_id);
            if (!$courses) {

                return response()->json(['success' => false, 'message' => "Invalid Id"], 422);
            }
            $course_assignment = CourseAssignments::where('course_id', $courses->id)->get();
            $courses->course_assignment = $course_assignment;
            return response()->json(['success' => true, 'message' => "Data get successfully", "courses" => $courses], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }
}
