<?php

namespace App\Http\Controllers;

use App\Models\Presentations;
use App\Models\Students;
use App\Models\Franchise;
use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ScheduledPresentations;

class StudentController extends Controller
{
    public function index()
    {
        $presentations = Presentations::all();
        return view('dashboard', compact('presentations'));
    }
    public function upload()
    {
        $presentations = Presentations::all();
        return view('upload-document', compact('presentations'));
    }
    public function uploadDocument(Request $request)
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Check if the user is a student
        if ($user->role === 2) {
            // Retrieve the group ID(s) associated with the student
            $groupIds = $user->groups()->pluck('groups.id')->toArray();

            // dd($groupIds);

            // You can choose how to handle the group ID(s) here, depending on your application's logic
            // For example, you can use the first group ID or store multiple group IDs

            // Example: Store the first group ID
            // $groupId = count($groupIds) > 0 ? $groupIds[0] : null;

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $file = $request->file('file');
                $directory = 'uploads';
                $filePath = $file->move(public_path($directory), $file->getClientOriginalName());

                // Save file upload information to the database
                $upload = new FileUpload();
                $upload->file_path = $file->getClientOriginalName();
                $upload->user_id = $user->id;
                $upload->group_id = 1;
                $upload->save();

                return redirect()->back()->with('success', 'File uploaded successfully.');
            }

            // return redirect()->back()->with('error', 'No valid file uploaded.');
        }

        return redirect()->back()->with('error', 'Only students can upload files.');
    }
    public function chat()
    {
        return view('group-chat');
    }


}
