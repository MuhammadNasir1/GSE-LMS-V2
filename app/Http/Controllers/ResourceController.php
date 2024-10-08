<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        $courses = Course::all();
        return view("resources", compact('resources', 'courses'));
    }
    public function add(Request $request)
    {
        try {
            $validateData = $request->validate([
                "file" => "required",
                "name" => "required",
                "course" => "required",
                "description" => "required",
            ]);

            $resource = new Resource;
            $resource->name = $validateData['name'];
            $resource->course = $validateData['course'];
            $resource->description = $validateData['description'];

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/resources_files', $imageName); // Adjust storage path as needed
                $resource->file = 'storage/resources_files/' . $imageName;
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

    public function get(string $id)
    {
        $get = Resource::find($id);
        return view("resources", compact('get'));
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
}
