<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Category;
use App\Models\Students;
use App\Models\Franchise;
use Illuminate\Http\Request;
use App\Models\ScheduledPresentations;

class FacultyController extends Controller
{
    public function index()
    {
        $presentations = ScheduledPresentations::all();
        return view('faculty.dashboard', compact('presentations'));
    }

    public function evaluateMinor()
    {
        return view('faculty.evaluate-minor');
    }
    public function evaluateMajor()
    {
        return view('faculty.evaluate-major');
    }

    public function groupsAssigned()
    {
        $groups = Groups::with('members')->get();
        return view('faculty.groups-assigned', compact('groups'));
    }
}

