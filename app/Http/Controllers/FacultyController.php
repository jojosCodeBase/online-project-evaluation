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
use App\Models\ScheduledPresentations;

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

        // $documents = Document::join('presentations', 'presentations.id', '=', 'documents.presentation_id')
        // ->leftJoin('groups', 'documents.group_id', '=', 'groups.id')
        // ->leftJoin('projects', 'projects.id', 'presentations.project_id')
        // ->get();

        // $documents = Document::join('groups', 'groups.id', '=', 'documents.group_id')
        // ->join('groups_members', 'groups_members.group_id', '=', 'documents.group_id')
        // ->select('groups_members.regno')
        // ->get();

    //     $documents = Document::join('groups', 'groups.id', '=', 'documents.group_id')
    // ->join('groups_members', 'groups_members.group_id', '=', 'documents.group_id')
    // ->join('students', 'students.regno', '=', 'groups_members.regno')
    // ->join('presentations', 'presentations.id', '=', 'documents.presentation_id')
    // ->join('projects', 'projects.id', '=', 'presentations.project_id')
    // ->select('documents.*', 'groups.group_name as group_name', 'students.regno as student_regno', 'presentations.name as presentation_name', 'projects.project_name as project_name')
    // ->get();


    // $documents = Document::join('groups', 'groups.id', '=', 'documents.group_id')
    // ->join('groups_members', 'groups_members.group_id', '=', 'documents.group_id')
    // ->join('students', 'students.regno', '=', 'groups_members.regno')
    // ->join('presentations', 'presentations.id', '=', 'documents.presentation_id')
    // ->join('projects', 'projects.id', '=', 'presentations.project_id')
    // ->join('users', 'users.id', '=', 'students.user_id') // Join to the users table
    // ->select('documents.*', 'groups.group_name as group_name', 'students.regno as student_regno', 'presentations.name as presentation_name', 'projects.project_name as project_name', 'users.name as student_name') // Select student name from users table
    // ->get();

    $documents = Document::with(['group.members.student.user', 'presentation.project'])
    ->get();
// dd($documents);

// $totalDocuments = Document::count();

        // dd($documents);
        return view('faculty.evaluate-major', compact('projects', 'documents'));
    }

    public function groupsAssigned()
    {
        $groups = Groups::with('members')->get();
        return view('faculty.groups-assigned', compact('groups'));
    }
}

