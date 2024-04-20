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
            'member.*' => 'required|string|max:255', // This ensures all members are required
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
        $existingMemberNames = $group->members()->pluck('name');

        // dd($existingMemberNames);

        // Update or create group members
        foreach ($request->member as $memberName) {
            // Update member if it already exists
            $existingMember = $group->members()->where('name', $memberName)->first();
            if ($existingMember) {
                $existingMember->update(['name' => $memberName]);
            } else {
                // Create member if it doesn't exist
                $group->members()->create(['name' => $memberName]);
            }
        }

        // Delete members that are not in the request
        $group->members()->whereNotIn('name', $request->member)->delete();

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
        $group = Groups::with(['members', 'project', 'guide'])->findOrFail($id);
        return response()->json($group);
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    // public function addStudentView()
    // {
    //     $categories = Category::orderBy('name', 'asc')->get();
    //     return view('list', ['categories' => $categories]);
    // }

    // public function franchiseMapping($fid)
    // {
    //     $fname = Franchise::where('id', $fid)->pluck('name');
    //     return $fname[0];
    // }

    // public function listStudent(Request $r)
    // {
    //     $r->validate([
    //         'profile' => 'required|image|max:1024',
    //         'mode' => 'required|string|max:50',
    //         'category' => 'required|string|max:50',
    //         'placement' => 'required|string|max:50',
    //         'state' => 'required|string|max:50',
    //         'regno' => 'required|string|max:50',
    //         'since' => 'required|integer|between:2001, 2099',
    //         'month_year' => 'required|string|max:50',
    //         'exam_name' => 'required|string|max:50',
    //         'marks' => 'required|string|max:50',
    //         'stu_rank' => 'required|string|max:50',
    //         'stu_name' => 'required|string|max:50',
    //         'student_review' => 'required|string|max:200',
    //         'rating' => 'required|numeric',
    //     ]);

    //     if ($r->mode == 'on') {
    //         $r->franchise = "Global";
    //     } else {
    //         $r->validate(['franchise' => 'required|string|max:50']);
    //         $r->franchise = $this->franchiseMapping($r->franchise);
    //     }

    //     $file = $r->file('profile'); // Getting the uploaded file instance

    //     $filename = $r->regno . '_profile.' . $file->getClientOriginalExtension();

    //     $publicPath = public_path();

    //     $subdirectory = 'assets/profile_images';

    //     $directory = $publicPath . DIRECTORY_SEPARATOR . $subdirectory;

    //     if (!file_exists($directory)) {
    //         mkdir($directory, 0777, true);
    //     }

    //     $fullPath = $directory . DIRECTORY_SEPARATOR . $filename;

    //     if (move_uploaded_file($file->getPathname(), $fullPath)) {
    //         // File was successfully saved
    //         $path = $filename;
    //     } else {
    //         // Failed to save the file
    //         $path = null;
    //     }

    //     $student = Students::create([
    //         'name' => $r->stu_name,
    //         'rank' => $r->stu_rank,
    //         'total_marks' => $r->marks,
    //         'exam_name' => $r->exam_name,
    //         'exam_month_year' => $r->month_year,
    //         'since' => $r->since,
    //         'regno' => $r->regno,
    //         'state' => $r->state,
    //         'placement' => $r->placement,
    //         'category' => $r->category,
    //         'mode' => $r->mode,
    //         'franchise' => $r->franchise,
    //         'review' => $r->student_review,
    //         'rating' => $r->rating,
    //         'profile' => $path,
    //     ]);


    //     if ($student)
    //         return back()->with('success', 'Student listed successfully');
    //     else
    //         return back()->with('error', 'Some error occured in listing student');
    // }

    // public function updateStudent(Request $r)
    // {
    //     $r->validate([
    //         'mode' => 'required|string|max:50',
    //         'category' => 'required|string|max:50',
    //         'placement' => 'required|string|max:50',
    //         'state' => 'required|string|max:50',
    //         'since' => 'required|integer|between:2001, 2099',
    //         'month_year' => 'required|string|max:50',
    //         'exam_name' => 'required|string|max:50',
    //         'marks' => 'required|string|max:50',
    //         'stu_rank' => 'required|string|max:50',
    //         'stu_name' => 'required|string|max:50',
    //         'student_review' => 'required|string|max:200',
    //         'rating' => 'required|numeric',
    //     ]);

    //     if (!$r->has('keep_profile_image')) {
    //         $r->validate(['profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg']);
    //     }

    //     if ($r->mode == 'on') {
    //         $r->franchise = "Global";
    //     } else {
    //         $r->validate(['franchise' => 'required|string|max:50']);
    //     }

    //     if ($r->has('keep_profile_image')) {
    //         $student = Students::where('regno', $r->regno)->update([
    //             'name' => $r->stu_name,
    //             'rank' => $r->stu_rank,
    //             'total_marks' => $r->marks,
    //             'exam_name' => $r->exam_name,
    //             'exam_month_year' => $r->month_year,
    //             'since' => $r->since,
    //             'state' => $r->state,
    //             'placement' => $r->placement,
    //             'category' => $r->category,
    //             'mode' => $r->mode,
    //             'franchise' => $r->franchise,
    //             'rating' => $r->rating,
    //             'review' => $r->student_review,
    //         ]);
    //     } else {
    //         $file = $r->file('profile_image'); // Getting the uploaded file instance

    //         $filename = $r->regno . '_profile.' . $file->getClientOriginalExtension();

    //         $publicPath = public_path();

    //         $subdirectory = 'assets/profile_images';

    //         $directory = $publicPath . DIRECTORY_SEPARATOR . $subdirectory;

    //         if (!file_exists($directory)) {
    //             mkdir($directory, 0777, true);
    //         }

    //         $fullPath = $directory . DIRECTORY_SEPARATOR . $filename;

    //         if (move_uploaded_file($file->getPathname(), $fullPath)) {
    //             // File was successfully saved
    //             $path = $filename;
    //         } else {
    //             // Failed to save the file
    //             $path = null;
    //         }

    //         $student = Students::where('regno', $r->regno)->update([
    //             'name' => $r->stu_name,
    //             'rank' => $r->stu_rank,
    //             'total_marks' => $r->marks,
    //             'exam_name' => $r->exam_name,
    //             'exam_month_year' => $r->month_year,
    //             'since' => $r->since,
    //             'state' => $r->state,
    //             'placement' => $r->placement,
    //             'category' => $r->category,
    //             'mode' => $r->mode,
    //             'franchise' => $r->franchise,
    //             'review' => $r->student_review,
    //             'rating' => $r->rating,
    //             'profile' => $path,
    //         ]);
    //     }

    //     if ($student)
    //         return back()->with('success', 'Student details updated successfully');
    //     else
    //         return back()->with('error', 'Some error occured in updating student details');
    // }

    public function evaluateMinor()
    {
        return view('admin.evaluate-minor');
    }
    public function evaluateMajor()
    {
        return view('admin.evaluate-major');
    }

    public function manageGroups()
    { // Fetch all groups with their members from the database
        $groups = Groups::with(['members', 'project', 'guide'])->paginate(5);
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
            'member.*' => 'required|string|max:255', // This ensures all members are required
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
        foreach ($r->member as $memberName) {
            GroupsMembers::create([
                'group_id' => $group->id,
                'name' => $memberName
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
