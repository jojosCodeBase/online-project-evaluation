<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Groups;
use App\Models\Category;
use App\Models\Document;
use App\Models\Projects;
use App\Models\Students;
use App\Models\Franchise;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\GroupsMembers;
use App\Models\Presentations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function updateGroup(Request $request)
    {
        // dd($request->all());

        $rules = [
            'group_name' => 'required|string|max:255',
            'project' => 'required|integer',
            'guide' => 'required|integer',
            'topic' => 'required|string|max:255',
            'member.*' => 'required|integer', // This ensures all members are required
        ];

        $messages = [
            'member.*.required' => 'All members are required.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the group by its ID
        $group = Groups::findOrFail($request->id);


        // Update the group attributes
        $group->update([
            'group_name' => $request->group_name,
            'project_id' => $request->project,
            'project_guide' => $request->guide,
            'topic' => $request->topic,
        ]);

        // Get the names of existing members for the group
        $existingMemberNames = $group->members()->pluck('regno');

        // dd($existingMemberregnos);

        // Update or create group members
        foreach ($request->member as $memberRegno) {
            // Update member if it already exists
            $existingMember = $group->members()->where('regno', $memberRegno)->first();
            if ($existingMember) {
                $existingMember->update(['regno' => $memberRegno]);
            } else {
                // Create member if it doesn't exist
                $group->members()->create(['regno' => $memberRegno]);
            }
        }

        // Delete members that are not in the request
        $group->members()->whereNotIn('regno', $request->member)->delete();

        if ($group)
            return back()->with('success', 'Group Updated Successfully');
        else
            return back()->with('error', 'Some error occured in updating group');
    }
    public function presentations()
    {
        // Implement logic for /presentations route
        return view('admin.presentation');
    }

    public function manageProject()
    {
        // Implement logic for /manage-project route
        return view('admin.manage-project');
    }

    public function managePresentation()
    {
        // Implement logic for /manage-presentation route
        return view('admin.manage-presentation');
    }
    public function getGroupInfo($id)
    {
        // $group = Groups::with(['members', 'project', 'guide'])->findOrFail($id);
        $group = Groups::with(['members.student.user', 'project', 'guide'])->findOrFail($id);

        return response()->json($group);
    }

    public function index()
    {
        $students = Students::count();
        $faculties = User::where('role', 1)->count();
        $presentations = Presentations::join('projects', 'projects.id', '=', 'presentations.project_id')
            ->select('presentations.*', 'projects.project_name as project_name', 'projects.id as project_id')
            ->paginate(10);
        return view('admin.dashboard', compact('students', 'faculties', 'presentations'));
    }

    public function evaluations()
    {
        // $groupedEvaluations = $evaluations->groupBy(['group_id', 'presentation_id']);

        // $studentIds = [];

        // // Iterate over each group of evaluations
        // foreach ($groupedEvaluations as $groups) {
            //     // Extract distinct student IDs from the current group and merge with existing IDs
            //     foreach($groups as $group){
                //         $studentIds = array_merge($studentIds, $group->pluck('student_id')->unique()->toArray());
                //     }
                // }

                // // dd($studentIds);
        $evaluations = Evaluation::all();
        $grouped = $evaluations->groupBy(['student_id']);

        $averageTotals = [];
        $studentIds = Evaluation::distinct('student_id')->pluck('student_id');

        foreach ($studentIds as $studentId) {
            $totalSum = Evaluation::where('student_id', $studentId)
                ->sum('total');

            $evaluationCount = Evaluation::where('student_id', $studentId)
                ->count();

            if ($evaluationCount > 0) {
                $averageTotal = $totalSum / $evaluationCount;
                $averageTotals[$studentId] = $averageTotal;
            }
        }

        // dd($grouped);
        return view('admin.evaluations', compact('averageTotals', 'grouped'));
    }

    public function getGroupMembers($groupId)
    {
        $members = GroupsMembers::with('student.user')
            ->where('group_id', $groupId)
            ->get();
        // dd($members);
        return response()->json($members);
    }

    public function manageGroups()
    {
        // Fetch all groups with their members from the database
        // $groups = Groups::with(['members', 'project', 'guide'])->paginate(5);
        $groups = Groups::with(['members.student.user', 'project', 'guide'])->paginate(5);

        // dd($groups);
        $projects = Projects::all();
        $faculties = User::where('role', 1)->get();
        // Pass the groups data to the view
        return view('admin.manage-groups', compact('groups', 'projects', 'faculties'));
    }

    public function addGroup(Request $r)
    {
        // dd($r->all());
        $rules = [
            'group_name' => 'required|string|max:255',
            'project' => 'required|integer',
            'guide' => 'required|integer',
            'topic' => 'required|string|max:255',
            'member.*' => 'required|integer', // This ensures all members are required
        ];

        $messages = [
            'member.*.required' => 'All members are required.',
        ];

        // Validate the request data
        $validator = Validator::make($r->all(), $rules, $messages);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $group = Groups::create([
            'group_name' => $r->group_name,
            'project_id' => $r->project,
            'project_guide' => $r->guide,
            'topic' => $r->topic
        ]);

        // Assuming 'member' is an array of members' names
        foreach ($r->member as $memberRegno) {
            GroupsMembers::create([
                'group_id' => $group->id,
                'regno' => $memberRegno
            ]);
        }

        if ($group)
            return back()->with('success', 'Group Added Successfully');
        else
            return back()->with('error', 'Some error occured in adding group');
    }

    public function deleteGroup(Request $r)
    {
        $groupId = $r->id;

        // Delete associated documents
        $deletedDocuments = Document::where('group_id', $groupId)->delete();

        // Delete associated group members
        $deletedMembers = GroupsMembers::where('group_id', $groupId)->delete();

        // Delete the group
        $deletedGroup = Groups::where('id', $groupId)->delete();

        if ($deletedGroup && $deletedMembers && $deletedDocuments) {
            return back()->with('success', 'Group and associated members, documents deleted successfully');
        } else {
            return back()->with('error', 'Some error occurred in deleting group');
        }
    }
}
