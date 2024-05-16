<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Groups;
use App\Models\Document;
use App\Models\Students;
use App\Models\Franchise;
use App\Models\Evaluation;
use App\Models\FileUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\GroupsMembers;
use App\Models\Presentations;
use Illuminate\Support\Facades\Auth;
use App\Models\ScheduledPresentations;

class StudentController extends Controller
{
    public function index()
    {
        $presentations = Presentations::join('projects', 'projects.id', '=', 'presentations.project_id')
            ->select('presentations.*', 'projects.project_name as project_name', 'projects.id as project_id')
            ->paginate(10);

        $userdata = User::with('student.groupMember.group')->where('id', Auth::user()->id)->first();
        $project_id = $userdata->student->groupMember->group->project_id;
        $upcoming_presentation = Presentations::where('project_id', $project_id)->latest()->pluck('date')->first();
        $upcoming_presentation = Carbon::parse($upcoming_presentation)->format('d-m-Y');

        $projectGuide = User::where('id', $userdata->student->groupMember->group->project_guide)->pluck('name')->first();
        $documentsSubmitted = Document::where('group_id', $userdata->student->groupMember->group->id)->count();

        return view('dashboard', compact('presentations', 'upcoming_presentation', 'projectGuide', 'documentsSubmitted'));
    }
    public function upload()
    {
        $user = Auth::user();
        $user->load(['student.groupMember.group']);

        // Assuming the user is a student and belongs to only one group for simplicity
        $groupId = $user->student->groupMember->group->id;
        $projectId = $user->student->groupMember->group->project_id;

        // dd($projectId);

        $groupMember = GroupsMembers::where('regno', $user->student->regno)->first();

        if (!is_null($groupMember)) {
            $groupId = $groupMember->group_id;

            $documents = Document::where('group_id', $groupId)->get();

            $presentations = Presentations::where('project_id', $projectId)->get();

            $feedback = Evaluation::where('group_id', $groupId)->get();

            // foreach($presentations as $presentation){
            //     echo $feedback[]
            // }
            // if(is_null($feedback))
            //     $feedback = "";

            return view('upload-document', compact('presentations', 'documents', 'feedback'));
        } else {
            $presentations = [];
            return view('upload-document', compact('presentations'));
        }
    }
    public function uploadDocument(Request $request)
    {
        // dd($request->all());
        // Fetch the authenticated user
        $user = Auth::user();
        $student = $user->student;

        if ($student) {
            $regno = $student->regno;

            $groupMember = GroupsMembers::where('regno', $student->regno)->first();

            $groupId = $groupMember->group_id;

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $file = $request->file('file');
                $directory = 'uploads';

                $file->move(public_path($directory), $file->getClientOriginalName());

                // Save file upload information to the database
                $document = new Document();
                $document->file_url = $file->getClientOriginalName();
                $document->presentation_id = $request->presentation_id;
                $document->uploaded_by = $regno;
                $document->group_id = $groupId;
                $document->save();

                return redirect()->back()->with('success', 'File uploaded successfully.');
            }

        } else {
            return redirect()->back()->with('error', 'Only students can upload files.');
        }
    }
    public function chat()
    {
        return view('group-chat');
    }
}
