<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAssignments;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        $courses = Course::select('id', 'name')->get();
        $assignments = CourseAssignments::select('id', 'title')->get();
        // $ = Course::all();
        return view("resources", compact('resources', 'courses', 'assignments'));
    }
    public function add(Request $request)
    {
        try {
            $validateData = $request->validate([

                'resource_name' => 'required',
                'resource_file' => 'required',
                'course' => 'required',
                'course_assignments' => 'required',
                'description' => 'required',
            ]);

            $resource = new Resource;
            $resource->resource_name = $validateData['resource_name'];
            $resource->course = $validateData['course'];
            $resource->course_assignments = $validateData['course_assignments'];
            $resource->description = $validateData['description'];

            if ($request->hasFile('resource_file')) {
                $image = $request->file('resource_file');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/resources_files', $imageName); // Adjust storage path as needed
                $resource->resource_file = 'storage/resources_files/' . $imageName;
            }

            $resource->save();
            return response()->json(['success' => true, 'message' => "Data add successfully"], 201);
            // return redirect("../resources");
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage()], 500);
        }
    }



    public function delete(string $id)
    {
        $del = Resource::find($id)->delete();
        return redirect()->back();
    }

    public function update(string $id, Request $request)
    {
        try {
            $validateData = $request->validate([
                "file" => "required",
                "name" => "required",
                "course" => "required",
                "description" => "required",
            ]);

            $resource = Resource::find($id);
            $resource->name = $validateData['name'];
            $resource->course = $validateData['course'];
            $resource->description = $validateData['description'];

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/resources_files', $imageName); // Adjust storage path as needed
                $resource->file = 'storage/resources_files/' . $imageName;
            }

            $resource->update();

            return redirect("../resources");
        } catch (\Exception $error) {
            return response()->json(['success' => false, 'message' => $error->getMessage()]);
        }
    }

    public function getResources()
    {
        $user_role = session('user_det')['role'];
        $user_course = User::where('id', session('user_det')['user_id'])->value('course');
        if ($user_role == "admin") {
            $resources = Resource::all();
        } else if ($user_role == "assessor") {
            $resources = Resource::where('course', $user_course)->get();
        } else {

            $resources = Resource::where('course', $user_course)->get();
        }
        foreach ($resources as $course) {

            $course_data = Course::select('id', 'name')->where('id', $course->id)->first();
            $course->course = $course_data;
        }

        return view('view_resources', compact('resources'));

        return response()->json($user_course);
    }
}
