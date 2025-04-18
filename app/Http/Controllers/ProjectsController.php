<?php

namespace App\Http\Controllers;

use App\Models\PicType;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function create(Request $request){
        
        $validated = $request -> validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'task' => 'required|string|max:1000',
            'url' => 'required|url',
            'selected' => 'nullable|in:0,1',
            'client' => 'nullable|string|max:255',
            'pictures' => 'required',
            'pictures.*' => 'required',
            'picture_types' => 'required',
            'picture_types.*' => 'in:medium,large',
            'tags.*' => 'required|string|max:50'
        ]);
        
        // dd($validated["url"]);
        $project = Project::where('name', $validated['name'])->first();

        if (!$project) {

            $project = Project::firstOrCreate([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'task' => $validated['task'],
                'url' => $validated['url'],
                'selected' => $validated['selected'] ?? 0,
                'client' => $validated['client'] ?? null,
            ]);


            // Create Tags
            foreach ($request->tags as $tag) {
                $project->tags()->create(['name' => $tag]);
            }


            // Store Pictures
            foreach ($request->file('pictures') as $index => $picture) {
                $type = $validated['picture_types'][$index];
                if($type == 'medium'){
                    $type = PicType::getMediumId();
                }else if($type == 'large'){
                    $type = PicType::getLargeId();
                }

                $path = $picture->store("projects", 'public');
                $path = "storage/" . $path;
                
                $project->ProjectPics()->create([
                    'path' => $path,
                    'pic_type_id' => $type,
                    // 'original_name' => $picture->getClientOriginalName(),
                    // 'size' => $picture->getSize(),
                    // 'mime_type' => $picture->getMimeType()
                ]);
            }
            return response()->json([
                'message' => 'Project created successfully',
                'project' => $project
            ], 201);
        }
        return response()->json([
            'message' => 'Project already exists',
            'project' => $project
        ], 409);
       
    }



    public function show(Project $project){
        // dd($project->id);
        $project = Project::where('id', $project -> id)->first();
        if($project){
            return view('pages.project-single', ['project' => $project]);
        }
        return abort(400);
    }



    public function delete($id){


        if(Auth::user() -> email != env('ADMIN_EMAIL')){
            return redirect("/") -> with('message', 'You are not logged in');
            exit();
        }

        $project = Project::find($id);
        if($project){
            $project -> delete();
            return redirect("/")->with('message', 'Project deleted successfully');
        }
        return redirect("/")->with('message', 'Project not found');
    }
}
