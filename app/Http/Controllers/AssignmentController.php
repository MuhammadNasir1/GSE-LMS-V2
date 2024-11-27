<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\assignmentReport;
use App\Models\assignmentReview;
use App\Models\Course;
use App\Models\CourseAssignments;
use App\Models\User;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {

        $userRole = session('user_det')['role'];
        $user_id = session('user_det')['user_id'];
        if ($userRole == "student") {
            $assignments = Assignment::where('user_id',  $user_id)->get();
            $user_course  = User::select('course')->where('id', $user_id)->first();
            $course = Course::select('id', 'name')->where('id', $user_course->course)->first();
            $course->course_assignments = CourseAssignments::where('course_id', $course->id)->get();
        } else {
            $course = Course::all();

            $assignments = Assignment::all();
        }

        //  return response()->json($course);

        return  view('assignment', compact('assignments'));
    }

    public function add(Request $request)
    {

        try {
            $validateData = $request->validate([
                'name' => 'required',
                'file' => 'required',
                'status' => 'nullable',
                'description' => 'required',
            ]);

            $resource = new Assignment;
            $resource->user_id = session('user_det')['user_id'];
            $resource->name = $validateData['name'];
            $resource->description = $validateData['description'];
            $resource->status = "pending";

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/assignment_files', $imageName); // Adjust storage path as needed
                $resource->file = 'storage/assignment_files/' . $imageName;
            }

            $resource->save();
            return response()->json(['success' => true, 'message' => "Data add successfully"], 201);
            // return redirect("../resources");
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage()], 500);
        }
    }

    public function assignmentReview(Request $request, $assignment_id)
    {
        try {

            // return response()->json($request);
            $validateData = $request->validate([
                'status' => 'nullable',
                'note' => 'required',
                'assignment_id' => 'required',
            ]);
            $assigment = Assignment::find($assignment_id);
            $assigment->status = "reviewed";


            $reviews = assignmentReport::create([
                'checker_user_id' => session('user_det')['user_id'],
                'user_id' => $assigment->user_id,
                'assignment_id' => $validateData['assignment_id'],
                'status' => $validateData['status'],
                'note' => $validateData['note'],
            ]);
            $reviews->save();
            $assigment->update();
            return response()->json(['success' => true, 'message' => "Data add successfully"], 201);
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage()], 500);
        }
    }
}
