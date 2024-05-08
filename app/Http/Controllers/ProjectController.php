<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Projects::join('users', 'projects.project_coordinator_id', '=', 'users.id')
            ->select('projects.*', 'users.name as coordinator_name')
            ->paginate(5);

        $faculties = User::where('role', 1)->get();
        return view('admin.manage-project', compact('projects', 'faculties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string',
            'course' => 'required|string',
            'co_ordinator' => 'required|numeric',
        ]);

        Projects::create([
            'project_name' => $request->project_name,
            'course' => $request->course,
            'project_coordinator_id' => $request->co_ordinator,
        ]);

        return redirect()->route('admin.manage-project')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Projects $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Projects $project)
    {
        $request->validate([
            'project_name' => 'required|string',
            'course' => 'required|string',
            'co_ordinator' => 'required|numeric',
        ]);

        Projects::where('id', $request->id)
            ->update([
                'project_name' => $request->project_name,
                'course' => $request->course,
                'project_coordinator_id' => $request->co_ordinator,
            ]);

        return redirect()->route('admin.manage-project')
            ->with('success', 'Project updated successfully');
    }

    public function destroy(Request $r)
    {
        Projects::where('id', $r->id)->delete();
        return redirect()->route('admin.manage-project')
            ->with('success', 'Project deleted successfully');
    }

    // ajax
    // public function getProject($id)
    // {
    //     return response()->json(Projects::where('id', $id)->first());
    // }
    public function getFaculties()
    {
        return response()->json(User::where('role', 1)->get());
    }

}
