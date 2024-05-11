<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Groups;
use App\Models\Category;
use App\Models\Projects;
use App\Models\Students;
use App\Models\Franchise;
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

    public function evaluateMinor()
    {
        return view('admin.evaluate-minor');
    }
    public function evaluateMajor()
    {
        return view('admin.evaluate-major');
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

    // public function deleteFranchise(Request $r)
    // {
    //     if (Franchise::where('id', $r->id)->delete())
    //         return back()->with('success', 'Franchise deleted successfully');
    //     else
    //         return back()->with('error', 'Some error occured in deleting franchise');
    // }

    // public function getInfo($id)
    // {
    //     $student = Students::where('id', $id)->get();
    //     if (!is_null($student)) {
    //         return response()->json(['student' => $student]);
    //     } else
    //         return response()->json(['error' => 'Some error occured in fetching student details']);
    // }

    // public function studentDelete(Request $r)
    // {
    //     $delete = Students::where('id', $r->stid)->delete();
    //     if ($delete)
    //         return back()->with('success', 'Student details deleted successfully');
    //     else
    //         return back()->with('error', 'Some error occured in deleting student details');
    // }
    // public function addCategory(Request $r)
    // {
    //     $r->validate([
    //         'name' => 'required|unique:category,name',
    //     ], [
    //         'name.unique' => 'Exam Category already exists.',
    //     ]);

    //     // Attempt to create the category
    //     $category = Category::create([
    //         'name' => $r->name,
    //     ]);

    //     // Check if the category was created successfully
    //     if ($category) {
    //         return back()->with('success', 'Category added successfully!');
    //     } else {
    //         return back()->with('error', 'Some error occurred in adding category!');
    //     }
    // }

    // public function manageCategory()
    // {
    //     $categories = Category::orderBy('created_at', 'desc')->paginate(5);
    //     return view('manage-category', ['categories' => $categories]);
    // }

    // public function updateCategory(Request $r)
    // {
    //     $r->validate([
    //         'name' => 'required|string|max:250',
    //     ]);
    //     $update = Category::where('id', $r->id)->update([
    //         'name' => $r->name,
    //     ]);

    //     if ($update)
    //         return back()->with('success', 'Category updated successfully');
    //     else
    //         return back()->with('error', 'Some error occured in updating category');
    // }

    // public function getCategory($id)
    // {
    //     $category = Category::where('id', $id)->get();

    //     if ($category)
    //         return response()->json(['category' => $category]);
    //     else
    //         return response()->json(['message' => 'Some error occured in fetching category information']);
    // }

    // public function categoryDelete(Request $r)
    // {
    //     if (Category::where('id', $r->id)->delete())
    //         return back()->with('success', 'Category deleted successfully');
    //     else
    //         return back()->with('error', 'Some error occured in deleting category');
    // }

    // public function getCategories()
    // {
    //     return response()->json(['categories' => Category::all()]);
    // }
}
