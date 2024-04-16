<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Franchise;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('dashboard', ['count' => Students::count(), 'franchise' => Franchise::orderBy('name')->paginate(5)]);
    }
    public function upload()
    {
        return view('upload-document', ['count' => Students::count(), 'franchise' => Franchise::orderBy('name')->paginate(5)]);
    }
    public function chat()
    {
        return view('group-chat', ['count' => Students::count(), 'franchise' => Franchise::orderBy('name')->paginate(5)]);
    }
}
