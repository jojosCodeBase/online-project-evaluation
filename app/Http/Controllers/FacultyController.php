<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Category;
use App\Models\Document;
use App\Models\Projects;
use App\Models\Students;
use App\Models\Franchise;
use Illuminate\Http\Request;
use App\Models\Presentations;

class FacultyController extends Controller
{
    public function index()
    {
        $presentations = Presentations::all();
        return view('faculty.dashboard', compact('presentations'));
    }

    public function evaluateMinor()
    {
        // $document = Document::where('project_id', $projectId)->get();
        $projects = Projects::where('project_name', 'Minor')->get();
        // $documents = Document::where('group_id', $groupId)->get();
        // dd($document);
        $presentations = Presentations::all();
        return view('faculty.evaluate-minor', compact('presentations', 'projects'));
    }
    public function evaluateMajor()
    {
        //  $document = Document::where('project_id', $projectId)->get();
        $projects = Projects::where('project_name', 'Major')->first();

        $documents = Document::with(['group.members.student.user', 'presentation.project'])
            ->get();
        return view('faculty.evaluate-major', compact('projects', 'documents'));
    }

    public function groupsAssigned()
    {
        $groups = Groups::with('members')->get();
        return view('faculty.groups-assigned', compact('groups'));
    }
}

