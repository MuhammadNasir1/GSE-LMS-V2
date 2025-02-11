<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\assignmentReport;
use App\Models\assignmentReview;
use App\Models\Course;
use App\Models\CourseAssignments;
use App\Models\EnrollUnits;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AssignmentController extends Controller
{
    public function index(Request $request)
    {

        $userRole = session('user_det')['role'];
        $user_id = session('user_det')['user_id'];

        $status =  base64_decode($request['s']);
        if ($status == 1) {
            $assignments = Assignment::where('status', 1)->where('user_id', $user_id)->get();
        } elseif ($status == 2) {
            $assignments = Assignment::where('status', 2)->where('user_id', $user_id)->get();
        } elseif ($status == 3) {
            $assignments = Assignment::where('status', 3)->where('user_id', $user_id)->get();
        } else {
            $assignments = Assignment::where('user_id', $user_id)->get();
        }

        $units = EnrollUnits::whereNotIn('checked_status', [2, 1])->where('user_id', $user_id)->get();

        // return response()->json($units);
        foreach ($units as $unit) {
            $unit->course = CourseAssignments::select('title', 'course_id')->where('id', $unit->assignment_id)->first();
            $unit->assessor_id = Course::where('id',  $unit->course->course_id)->value('assessor_id');
        }
        foreach ($assignments as $assignment) {
            $assignmentData = CourseAssignments::where('id', $assignment->assignment_id)->first(['title', 'refrence_no']);
            $assignment->unit = $assignmentData;
        }

        return  view('assignment', compact('units', "assignments"));
    }

    public function add(Request $request)
    {

        try {
            $user_id = session('user_det')['user_id'];
            $validateData = $request->validate([
                'assignment_id' => 'required',
                'file' => 'required',
                'description' => 'required',
                'assessor_id' => 'required',
            ]);

            $resource = new Assignment;
            $resource->user_id = $user_id;
            $resource->assessor_id = $validateData['assessor_id'];
            $resource->assignment_id = $validateData['assignment_id'];
            $resource->description = $validateData['description'];
            $resource->status = 2;

            $unit = EnrollUnits::where('assignment_id', $validateData['assignment_id'])->where('user_id', $user_id)->first();
            $unit->checked_status = 2;
            $unit->submission_count = $unit->submission_count + 1;
            $unit->update();
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = $user_id . 'i' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/assignment_files', $imageName);
                $resource->file = 'storage/assignment_files/' . $imageName;
            }
            $resource->save();
            return response()->json(['success' => true, 'message' => "Data add successfully"], 201);
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage()], 500);
        }
    }

    public function assignmentReview(Request $request,)
    {
        try {

            // return response()->json($request);
            $validateData = $request->validate([
                'user_id' => 'required',
                'status' => 'required',
                'note' => 'required',
                'assignment_id' => 'required',
            ]);
            // $assignment = Assignment::where('assignment_id', $validateData['assignment_id'])->where('user_id', $validateData['user_id'])->first();
            $assignment = Assignment::where('assignment_id', $validateData['assignment_id'])
    ->where('user_id', $validateData['user_id'])
    ->latest('created_at') // Order by the most recent one
    ->first(); // Get the first (latest) one
            $assignment->status = $validateData['status'];
            $assignment->note = $validateData['note'];



            $unit = EnrollUnits::where('assignment_id', $validateData['assignment_id'])->where('user_id', $validateData['user_id'])->first();
            if (!$unit) {
                return response()->json(['success' => false, 'message' => "Unit not found"], 500);
            }
            $unit->checked_status = $validateData['status'];
            if ($validateData['status'] == 3) {
                $unit->rejected_count = $unit->rejected_count + 1;
            }

            $unit->update();
            $assignment->update();

            $reviews = assignmentReport::create([
                'checker_user_id' => session('user_det')['user_id'],
                'user_id' => $assignment->user_id,
                'assignment_id' => $validateData['assignment_id'],
                'status' => $validateData['status'],
                'note' => $validateData['note'],
            ]);
            $reviews->save();
            return response()->json(['success' => true, 'message' => "Review add successfully"], 201);
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage()], 500);
        }
    }
    public function assignmentDate(Request $request)
    {

        // $status =  base64_decode($request['s']);
        // if ($status == 1) {
        //     $assignments = Assignment::where('status', 1)->where("assessor_id", session('user_det')['user_id'])->get();
        // } elseif ($status == 2) {
        //     $assignments = Assignment::where('status', 2)->where("assessor_id", session('user_det')['user_id'])->get();
        // } elseif ($status == 3) {
        //     $assignments = Assignment::where('status', 3)->where("assessor_id", session('user_det')['user_id'])->get();
        // } else {
        //     $assignments = Assignment::where("assessor_id", session('user_det')['user_id'])->get();
        // }

        // foreach ($assignments as $assignment) {
        //     $user = User::where('id', $assignment->user_id)->first(['name', 'course']);
        //     $assignment->user_name = $user->name;
        //     $assignment->time_ago = $assignment->created_at->diffForHumans();
        //     $assignment->assignment_name = CourseAssignments::where('id', $assignment->assignment_id)->value('title');
        //     $assignment->course_name = Str::limit(Course::where('id', $user->course)->value('name'), 16);
        // }


        $status = base64_decode($request['s']);
        if ($status == 1) {
            $assignments = Assignment::where('status', 1)->where("assessor_id", session('user_det')['user_id'])->get();
        } elseif ($status == 2) {
            $assignments = Assignment::where('status', 2)->where("assessor_id", session('user_det')['user_id'])->get();
        } elseif ($status == 3) {
            $assignments = Assignment::where('status', 3)->where("assessor_id", session('user_det')['user_id'])->get();
        } else {
            $assignments = Assignment::where("assessor_id", session('user_det')['user_id'])->get();
        }
        
        // Iterate over each assignment (no need to group assignments by user_id and assignment_id)
        foreach ($assignments as $assignment) {
            $user = User::where('id', $assignment->user_id)->first(['name', 'course']);
            $assignment->user_name = $user->name;
            $assignment->time_ago = $assignment->created_at->diffForHumans();
            $assignment->assignment_name = CourseAssignments::where('id', $assignment->assignment_id)->value('title');
            $assignment->course_name = Str::limit(Course::where('id', $user->course)->value('name'), 16);
        
            // Check how many times the user has submitted this assignment
            $resubmitCount = Assignment::where('user_id', $assignment->user_id)
                ->where('assignment_id', $assignment->assignment_id)
                ->count();
        
            // Check the latest submission of this assignment
            $latestAssignment = Assignment::where('user_id', $assignment->user_id)
                ->where('assignment_id', $assignment->assignment_id)
                ->orderBy('created_at', 'desc') // Sort by latest submission
                ->first(); // Get the most recent submission
        
            // Logic to determine resubmit and upload count
            if ($resubmitCount > 1) {
                // If the count is greater than 1, it means it's a resubmission
                if ($assignment->id == $latestAssignment->id) {
                    // If this is the latest assignment, mark it as "New Submission"
                    $assignment->resubmit = 0; // New submission
                } else {
                    // Older submissions are considered "resubmits"
                    $assignment->resubmit = 1; // Resubmitted
                }
                $assignment->upload_count = $resubmitCount; // Count how many times the assignment has been uploaded
            } else {
                // If count is 1, it's the first submission
                $assignment->resubmit = 0; // First submission
                $assignment->upload_count = 1; // Only one upload (first submission)
            }
        
            // Add the logic for determining the action button value
            // If it's the latest submission, label it as "New Submission"
            // if ($assignment->resubmit == 0) {
            //     $assignment->action_button = "New Submission"; // Action button for the newest submission
            // } else {
            //     $assignment->action_button = "Resubmit"; // Action button for resubmitted assignments
            // }
        }
        
        

        // return response()->json($assignments);
        return view('assignment_review', compact('assignments'));
    }
}
