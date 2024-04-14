<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Students;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $studentsByCategory = [];
        foreach ($categories as $category) {
            $studentCount = Students::where('category', $category->id)->count(); // Count the number of students for this category
            $categoryName = Category::where('id', $category->id)->pluck('name'); // Count the number of students for this category
            $students = Students::where('category', $category->id)
                ->orderBy('rank')
                ->limit(3)
                ->get();

            $studentsByCategory[$category->name] = [
                'count' => $studentCount, // Store the total count of students for this category
                'students' => $students,
                'categoryName' => $categoryName[0],
            ];
        }

        return view('home', ['studentsByCategory' => $studentsByCategory]);
    }
    public function allStudents($category)
    {
        $categoryId = Category::where('name', $category)->pluck('id');
        $students = Students::where('category', $categoryId)->get();
        return view('all-students', ['students' => $students, 'categoryName' => $category]);
    }
}
