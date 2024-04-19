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
        return view('faculty.dashboard');
    }

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
    }

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

    public function showBCAStudents()
    {
        return view('faculty.evaluate-bca');
    }
    public function showMCAStudents()
    {
        return view('faculty.evaluate-mca');
    }

    public function groupsAssigned()
    {
        return view('faculty.groups-assigned');
    }
}

