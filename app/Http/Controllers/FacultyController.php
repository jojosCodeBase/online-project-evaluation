<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Students;
use App\Models\Franchise;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        return view('faculty.dashboard', ['count' => Students::count(), 'franchise' => Franchise::orderBy('name')->paginate(5)]);
    }

    public function addStudentView()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('list', ['categories' => $categories]);
    }

    public function franchiseMapping($fid)
    {
        $fname = Franchise::where('id', $fid)->pluck('name');
        return $fname[0];
    }

    public function listStudent(Request $r)
    {
        $r->validate([
            'profile' => 'required|image|max:1024',
            'mode' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'placement' => 'required|string|max:50',
            'state' => 'required|string|max:50',
            'regno' => 'required|string|max:50',
            'since' => 'required|integer|between:2001, 2099',
            'month_year' => 'required|string|max:50',
            'exam_name' => 'required|string|max:50',
            'marks' => 'required|string|max:50',
            'stu_rank' => 'required|string|max:50',
            'stu_name' => 'required|string|max:50',
            'student_review' => 'required|string|max:200',
            'rating' => 'required|numeric',
        ]);

        if ($r->mode == 'on') {
            $r->franchise = "Global";
        } else {
            $r->validate(['franchise' => 'required|string|max:50']);
            $r->franchise = $this->franchiseMapping($r->franchise);
        }

        $file = $r->file('profile'); // Getting the uploaded file instance

        $filename = $r->regno . '_profile.' . $file->getClientOriginalExtension();

        $publicPath = public_path();

        $subdirectory = 'assets/profile_images';

        $directory = $publicPath . DIRECTORY_SEPARATOR . $subdirectory;

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $fullPath = $directory . DIRECTORY_SEPARATOR . $filename;

        if (move_uploaded_file($file->getPathname(), $fullPath)) {
            // File was successfully saved
            $path = $filename;
        } else {
            // Failed to save the file
            $path = null;
        }

        $student = Students::create([
            'name' => $r->stu_name,
            'rank' => $r->stu_rank,
            'total_marks' => $r->marks,
            'exam_name' => $r->exam_name,
            'exam_month_year' => $r->month_year,
            'since' => $r->since,
            'regno' => $r->regno,
            'state' => $r->state,
            'placement' => $r->placement,
            'category' => $r->category,
            'mode' => $r->mode,
            'franchise' => $r->franchise,
            'review' => $r->student_review,
            'rating' => $r->rating,
            'profile' => $path,
        ]);


        if ($student)
            return back()->with('success', 'Student listed successfully');
        else
            return back()->with('error', 'Some error occured in listing student');
    }

    public function updateStudent(Request $r)
    {
        $r->validate([
            'mode' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'placement' => 'required|string|max:50',
            'state' => 'required|string|max:50',
            'since' => 'required|integer|between:2001, 2099',
            'month_year' => 'required|string|max:50',
            'exam_name' => 'required|string|max:50',
            'marks' => 'required|string|max:50',
            'stu_rank' => 'required|string|max:50',
            'stu_name' => 'required|string|max:50',
            'student_review' => 'required|string|max:200',
            'rating' => 'required|numeric',
        ]);

        if (!$r->has('keep_profile_image')) {
            $r->validate(['profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg']);
        }

        if ($r->mode == 'on') {
            $r->franchise = "Global";
        } else {
            $r->validate(['franchise' => 'required|string|max:50']);
        }

        if ($r->has('keep_profile_image')) {
            $student = Students::where('regno', $r->regno)->update([
                'name' => $r->stu_name,
                'rank' => $r->stu_rank,
                'total_marks' => $r->marks,
                'exam_name' => $r->exam_name,
                'exam_month_year' => $r->month_year,
                'since' => $r->since,
                'state' => $r->state,
                'placement' => $r->placement,
                'category' => $r->category,
                'mode' => $r->mode,
                'franchise' => $r->franchise,
                'rating' => $r->rating,
                'review' => $r->student_review,
            ]);
        } else {
            $file = $r->file('profile_image'); // Getting the uploaded file instance

            $filename = $r->regno . '_profile.' . $file->getClientOriginalExtension();

            $publicPath = public_path();

            $subdirectory = 'assets/profile_images';

            $directory = $publicPath . DIRECTORY_SEPARATOR . $subdirectory;

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $fullPath = $directory . DIRECTORY_SEPARATOR . $filename;

            if (move_uploaded_file($file->getPathname(), $fullPath)) {
                // File was successfully saved
                $path = $filename;
            } else {
                // Failed to save the file
                $path = null;
            }

            $student = Students::where('regno', $r->regno)->update([
                'name' => $r->stu_name,
                'rank' => $r->stu_rank,
                'total_marks' => $r->marks,
                'exam_name' => $r->exam_name,
                'exam_month_year' => $r->month_year,
                'since' => $r->since,
                'state' => $r->state,
                'placement' => $r->placement,
                'category' => $r->category,
                'mode' => $r->mode,
                'franchise' => $r->franchise,
                'review' => $r->student_review,
                'rating' => $r->rating,
                'profile' => $path,
            ]);
        }

        if ($student)
            return back()->with('success', 'Student details updated successfully');
        else
            return back()->with('error', 'Some error occured in updating student details');
    }

    public function showBCAStudents()
    {
        $students = Students::orderBy('created_at', 'desc')->paginate(10);

        foreach ($students as $s) {
            if ($s['franchise'] == 'Global')
                continue;
            else {
                $name = Franchise::where('name', $s['franchise'])->pluck('name');
                $s['franchise'] = $name[0];
            }
        }
        return view('faculty.evaluate-bca', ['students' => $students]);
    }
    public function showMCAStudents()
    {
        $students = Students::orderBy('created_at', 'desc')->paginate(10);

        foreach ($students as $s) {
            if ($s['franchise'] == 'Global')
                continue;
            else {
                $name = Franchise::where('name', $s['franchise'])->pluck('name');
                $s['franchise'] = $name[0];
            }
        }
        return view('faculty.evaluate-mca', ['students' => $students]);
    }

    public function groupsAssigned()
    {
        return view('faculty.groups-assigned', ['franchises' => Franchise::orderBy('name')->paginate(2)]);
    }

    public function addFranchise(Request $r)
    {
        $r->validate([
            'franchise_name' => 'required|string|max:50',
            'url' => 'required|string',
        ]);

        $franchise = Franchise::create([
            'name' => $r->franchise_name,
            'url' => $r->url,
        ]);

        if ($franchise)
            return back()->with('success', 'Franchise Added Successfully');
        else
            return back()->with('error', 'Some error occured in adding franchise');
    }

    public function getFranchises()
    {
        $franchises = Franchise::all();
        if (!is_null($franchises))
            return response()->json(['franchises' => $franchises]);
        else
            return response()->json(['error' => 'Some error occured in fetching franchises']);
    }

    public function getFranchiseInfo($id)
    {
        return response()->json(['franchise' => Franchise::where('id', $id)->get()]);
    }
    public function updateFranchise(Request $r)
    {
        $r->validate([
            'franchise_name' => 'required|string|max:50',
            'url' => 'required|string',
        ]);
        $update = Franchise::where('id', $r->id)->update([
            'name' => $r->franchise_name,
            'url' => $r->url,
        ]);

        if ($update)
            return back()->with('success', 'Franchise updated successfully');
        else
            return back()->with('error', 'Some error occured in updating franchise');
    }
    public function deleteFranchise(Request $r)
    {
        if (Franchise::where('id', $r->id)->delete())
            return back()->with('success', 'Franchise deleted successfully');
        else
            return back()->with('error', 'Some error occured in deleting franchise');
    }

    public function getInfo($id)
    {
        $student = Students::where('id', $id)->get();
        if (!is_null($student)) {
            return response()->json(['student' => $student]);
        } else
            return response()->json(['error' => 'Some error occured in fetching student details']);
    }

    public function studentDelete(Request $r)
    {
        $delete = Students::where('id', $r->stid)->delete();
        if ($delete)
            return back()->with('success', 'Student details deleted successfully');
        else
            return back()->with('error', 'Some error occured in deleting student details');
    }
    public function addCategory(Request $r)
    {
        $r->validate([
            'name' => 'required|unique:category,name',
        ], [
            'name.unique' => 'Exam Category already exists.',
        ]);

        // Attempt to create the category
        $category = Category::create([
            'name' => $r->name,
        ]);

        // Check if the category was created successfully
        if ($category) {
            return back()->with('success', 'Category added successfully!');
        } else {
            return back()->with('error', 'Some error occurred in adding category!');
        }
    }

    public function manageCategory()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('manage-category', ['categories' => $categories]);
    }

    public function updateCategory(Request $r)
    {
        $r->validate([
            'name' => 'required|string|max:250',
        ]);
        $update = Category::where('id', $r->id)->update([
            'name' => $r->name,
        ]);

        if ($update)
            return back()->with('success', 'Category updated successfully');
        else
            return back()->with('error', 'Some error occured in updating category');
    }

    public function getCategory($id)
    {
        $category = Category::where('id', $id)->get();

        if ($category)
            return response()->json(['category' => $category]);
        else
            return response()->json(['message' => 'Some error occured in fetching category information']);
    }

    public function categoryDelete(Request $r)
    {
        if (Category::where('id', $r->id)->delete())
            return back()->with('success', 'Category deleted successfully');
        else
            return back()->with('error', 'Some error occured in deleting category');
    }

    public function getCategories()
    {
        return response()->json(['categories' => Category::all()]);
    }
}
