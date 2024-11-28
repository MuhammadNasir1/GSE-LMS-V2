<?php

namespace App\Http\Controllers;

use App\Mail\registrationMail;
use App\Models\Assignment;
use App\Models\assignmentReport;
use App\Models\Course;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\AssignRef;
use Symfony\Component\CssSelector\Node\FunctionNode;

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
        if($request['type'] == 'candidate'){
            $users =  User::where('role', 'candidate')->get();
        }elseif($request['type'] == 'assessor'){
            $users =  User::where('role', '	assessor')->get();
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
            Mail::to($validatedData['email'])->send(new registrationMail($user->name , Hash::make($user->id)));
            return response()->json(['success' => true, 'message' => 'User add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function CustomerUpdateData($user_id)
    {
        try {

            $customer = User::find($user_id);
            return response()->json(['success' => true,  'message' => "Data  Get Successfully", 'customer' => $customer]);
        } catch (\Exception $e) {
            return response()->json(['success' => false,  'message' => $e->getMessage()]);
        }
    }
    public function CustomerUpdate(Request $request, $user_id)
    {
        try {

            $customer = User::find($user_id);

            $validatedData = $request->validate([
                'name' => 'nullable',
                'email' => 'nullable',
                'phone_no' => 'nullable',
                'address' => 'nullable',
            ]);

            $customer->name = $validatedData['name'];
            $customer->phone = $validatedData['phone_no'];
            $customer->email = $validatedData['email'];
            $customer->address = $validatedData['address'];
            $customer->update();
            return response()->json(['success' => true,  'message' => "Data  Get Successfully", 'customer' => $customer]);
        } catch (\Exception $e) {
            return response()->json(['success' => false,  'message' => $e->getMessage()]);
        }
    }

    public function Dashboard()
    {
        return view('dashboard');
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

   
}
