<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Students;
use App\Models\Franchise;
use App\Models\FileUpload;
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
        return view('dashboard', compact('presentations'));
    }
    public function upload()
    {
        // get user group id
        $user = Auth::user();

        // $regno = $user->student->regno;

        $groupMember = GroupsMembers::where('regno', $user->student->regno)->first();

        $groupId = $groupMember->group_id;

        $documents = Document::where('group_id', $groupId)->get();
        // dd($document);
        $presentations = Presentations::all();

        return view('upload-document', compact('presentations', 'documents'));
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
