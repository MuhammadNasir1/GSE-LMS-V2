<?php

namespace App\Http\Controllers;

use App\Mail\registrationMail;
use App\Models\Assignment;
use App\Models\assignmentReport;
use App\Models\Course;
use App\Models\CourseAssignments;
use App\Models\EnrollUnits;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\AssignRef;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Support\Facades\Crypt;

class userController extends Controller
{


    public function language_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
    // dashboard  Users Couny
    public function users(Request $request)
    {
        if ($request['type'] == 'candidate') {
            $users =  User::where('role', 'candidate')->get();
        } elseif ($request['type'] == 'assessor') {
            $users =  User::where('role', 'assessor')->get();
        } else {
            $users =  [];
        }
        $courses = Course::all();
        return view('users', compact('users', 'courses'));
    }

    public function insert(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'course' => 'required',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'role' =>  $validatedData['role'],
                'password' => Hash::make(12345678),
                'course' =>  $validatedData['course'],
                'verification' => "approved",
            ]);
            Mail::to($validatedData['email'])->send(new registrationMail($user->name, asset("setupPassword?key=" . Hash::make($user->id))));
            return response()->json(['success' => true, 'message' => 'invitation Send Successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function Dashboard()
    {

        $user_role = session('user_det')['role'];
        $user_id = session('user_det')['user_id'];

        // Initialize variables
        $total_user = 0;
        $submission = 0;
        $approved = 0;
        $rejection = 0;
        $pending = 0;
        $recent_assignments = [];

        if ($user_role == "admin") {
            $total_user = User::where('role', '!=', 'admin')->count();
            $submission = Assignment::count();
            $approved = Assignment::where('status', 1)->count();
            $rejection = Assignment::where('status', 3)->count();
            $pending = Assignment::where('status', 2)->count();
        } elseif ($user_role == "assessor") {
            $submission = Assignment::where('assessor_id', $user_id)->count();
            $approved = Assignment::where('assessor_id', $user_id)->where('status', 1)->count();
            $rejection = Assignment::where('assessor_id', $user_id)->where('status', 3)->count();
            $pending = Assignment::where('assessor_id', $user_id)->where('status', 2)->count();
            $recent_assignments = Assignment::where('assessor_id', $user_id)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } elseif ($user_role == "candidate") {
            $submission = Assignment::where('user_id', $user_id)->count();
            $approved = Assignment::where('user_id', $user_id)->where('status', 1)->count();
            $rejection = Assignment::where('user_id', $user_id)->where('status', 3)->count();
            $pending = Assignment::where('user_id', $user_id)->where('status', 2)->count();
        }

        // Pass data to the dashboard view
        return view('dashboard', [
            'total_user' => $total_user,
            'submission' => $submission,
            'approved' => $approved,
            'rejection' => $rejection,
            'pending' => $pending,
            'recent_assignments' => $recent_assignments,
        ]);
    }

    public function changeVerifictionStatus(Request $request, $user_id)
    {


        try {
            $validatedData = $request->validate([
                'verification' => 'required|string', // Add more validation rules as needed
            ]);
            $user =   User::find($user_id);
            $user->verification = $validatedData['verification'];
            $user->save();

            return response()->json(['success' => true, 'message' => "User Status successfull Update"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function updateUserCar(Request $request, $id)
    {

        try {

            $validatedData = $request->validate([
                'name' => 'required|string',
                'role' => 'nullable',
            ]);

            if ($request->has('password'))

                $user = User::find($id);
            $user->name = $validatedData['name'];
            $user->role = $validatedData['role'];


            if ($request->has('email')) {
                $user->email = $request['email'];
            }
            if ($request->has('password')) {
                $user->password = Hash::make($request['password']);
            }


            if ($request->hasFile('upload_image')) {
                $image = $request->file('upload_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/user_images', $imageName); // Adjust storage path as needed
                $user->user_image = 'storage/user_images/' . $imageName;
            }
            $user->update();
            return redirect('../users');
        } catch (\Exception $e) {

            return redirect('../users');
        }
    }

    // get user assignment data from assignment and assignmen review
    public function userAssignmentData($user_id)
    {
        $userDetails =  User::find($user_id);
        $course = Course::find($userDetails->course);
        $totalAssignments = Assignment::where('user_id', $user_id)->count();
        $assessments = assignmentReport::where('user_id', $user_id)->where('status', 'approve')->count();
        $feedbacks = assignmentReport::where('user_id', $user_id)->where('status', 'rejected')->count();
        return view('user_profile', compact('userDetails', 'course', 'totalAssignments', 'assessments', 'feedbacks'));
    }


    public function setPassword(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'password' => 'required|confirmed',
            ]);

            $hashedUserId = $validatedData['user_id'];
            // Decrypt the hashed user_id
            $user = User::all()->first(function ($user) use ($hashedUserId) {
                return Hash::check($user->id, $hashedUserId);
            });

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found'], 404);
            }
            $user->password = $validatedData['password'];
            $user->save();

            return response()->json(['success' => true, 'message' => 'Password has been set', 'user' => $user], 200);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return response()->json(['success' => false, 'message' => 'Invalid user ID'], 400);
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }

    public function profileData(Request $request)
    {
        $user_id =  base64_decode($request['u']);
        // $user_id =  Crypt::decryptString($request['u']);
        $user = User::select('name', 'email', 'phone' , 'user_image')->where('id', $user_id)->first();
        $course_id  = User::where('id', $user_id)->value('course');
        $course = Course::where('id', $course_id)->first();
        $course->assessor = User::where('id', $course->assessor_id)->value('name');

        $enroll_assignments = EnrollUnits::where('user_id', $user_id)->get();
        $enroll_assignments->assignment_details = [];


        $totalCredits = 0;
        $totalSubmissions = 0;
        $totalRejections = 0;
        $completeCredits = 0;
        foreach ($enroll_assignments as $enrollment) {

            $course_assignments = CourseAssignments::where('id', $enrollment->assignment_id)->first();

            $enrollment->assignment_details =  $course_assignments;

            $totalCredits += $enrollment->assignment_details->credits;
            $totalSubmissions += $enrollment->submission_count;
            $totalRejections += $enrollment->rejected_count;
        }


        $completeAssignments = EnrollUnits::select('assignment_id')->where('user_id', $user_id)->where('checked_status', '1')->get();
        foreach ($completeAssignments as $completeAssignment) {
            $comCredits = CourseAssignments::select('credits')->where('id', $completeAssignment->assignment_id)->first();
            $completeCredits += $comCredits->credits;
        }

        $percentageCompleted = $totalCredits > 0
            ? round(($completeCredits / $totalCredits) * 100, 2)
            : 0;
        $progress_data = [
            'assessments' => $completeAssignments->count(),
            'completeCredits' => $completeCredits,
            'totalCredits' => $totalCredits,
            'totalSubmissions' => $totalSubmissions,
            'feedbacks' => $totalRejections,
            'completionPercentage' => $percentageCompleted,
        ];

        return view('profile', compact("course", "enroll_assignments", 'user', 'progress_data'));
    }
}
