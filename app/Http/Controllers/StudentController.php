<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Franchise;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function upload()
    {
        return view('upload-document');
    }
    public function chat()
    {
        return view('group-chat');
    }
}
