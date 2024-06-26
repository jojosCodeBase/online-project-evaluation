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
        $assigned_groups = Groups::where('project_guide', Auth::user()->id)->count();
        $evaluated = Evaluation::where('evaluator_id', Auth::user()->id)->count();
        return view('faculty.dashboard', compact('presentations', 'assigned_groups', 'evaluated'));
    }

    public function evaluateMinor()
    {
        $projects = Projects::where('project_name', 'Minor')->first();
        // dd($projects);

        $documents = Document::with(['group.members.student.user', 'presentation.project'])
            ->whereHas('presentation.project', function ($query) use ($projects) {
                $query->where('id', $projects->id);
            })
            ->get();

        // dd($documents);
        return view('faculty.evaluate-minor', compact('documents', 'projects'));
    }
    public function evaluateMajor()
    {
        $projects = Projects::where('project_name', 'Major')->first();

        $documents = Document::with(['group.members.student.user', 'presentation.project'])
            ->whereHas('presentation.project', function ($query) use ($projects) {
                $query->where('id', $projects->id);
            })
            ->get();

        return view('faculty.evaluate-major', compact('projects', 'documents'));
    }

    public function evaluateMajorMarks(Request $r)
    {
        // dd($r->all());
        foreach ($r->marks as $student_id => $mark) {
            Evaluation::create([
                'presentation_id' => $r->presentation_id,
                'student_id' => $student_id,
                'evaluator_id' => Auth::user()->id,
                'group_id' => $r->group_id,
                'presentation_content' => $mark[0], // assuming this comes from $r
                'presentation_skills' => $mark[1], // assuming this comes from $r
                'report_content' => $mark[2],// assuming this comes from $r
                'viva_voice' => $mark[3], // assuming this comes from $r
                'progress' => $mark[4],// assuming this comes from $r
                'total' => $mark[5], // assuming this comes from $r
                // 'remarks' => $r->remarks,
            ]);
        }


        try {
            Document::where('presentation_id', $r->presentation_id)->where('group_id', $r->group_id)->update(['status' => 1]);
            return back()->with('success', 'Evaluation successfully saved');
        } catch (\Exception $e) {
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
