<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Category;
use App\Models\Document;
use App\Models\Projects;
use App\Models\Students;
use App\Models\Franchise;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\Presentations;
use Illuminate\Support\Facades\Auth;

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

    public function evaluateMajorMarks(Request $r){
        // dd($r->all());
        foreach($r->marks as $regno => $mark){
            Evaluation::create([
                'presentation_id' => $r->presentation_id,
                'student_id' => $regno,
                'evaluator_id' => Auth::user()->id,
                'score' => $mark,
                'comments' => $r->remarks,
                'group_id' => $r->groupId,
            ]);
        }

        try{
            Document::where('presentation_id', $r->presentation_id)->where('group_id', $r->groupId)->update(['status' => 1]);
            return back()->with('success', 'Evaluation successfully');
        }catch(\Exception $e){
            return back()->with('error', 'Some error occured');
        }

    }

    public function groupsAssigned()
    {
        $groups = Groups::with(['members.student.user', 'project'])->where('project_guide', Auth::user()->id)->get();
        // dd($groups);
        // $projects = Groups::with('project')->where('project_guide', Auth::user()->id)->get();

        return view('faculty.groups-assigned', compact('groups'));
    }
}
