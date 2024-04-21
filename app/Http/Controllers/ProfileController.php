<?php

namespace App\Http\Controllers;

use App\Models\GroupsMembers;
use App\Models\Students;
use App\Models\User;
use App\Models\Groups;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function student_edit(Request $request): View
    {
        $user = Auth::user();

        // $data = User::with('student')->findOrFail($user->id);
        $user = User::with(['student' => function ($query) {
            $query->with('groupMember.group');
        }])->findOrFail($user->id);

        // Now, you can access the group ID of the associated student
        $groupId = $user->student->groupMember->group->id;

        // dd($user);

        $groupInfo = Groups::join('users', 'groups.project_guide', '=', 'users.id')
        ->leftJoin('projects', 'projects.id', '=', 'groups.project_id')
        ->select('groups.*', 'users.name as guide_name', 'projects.project_name')
        ->where('groups.id', $groupId)
        ->first();

        // $groupMembers = GroupsMembers::join('groups', 'groups.id', '=', 'groups_members.group_id')
        // join('groups', 'groups.id', '=', 'groups_members.group_id')
        $groupMembers = GroupsMembers::join('students', 'students.regno', '=', 'groups_members.regno')
        ->leftjoin('users', 'users.id', '=', 'students.user_id')
        ->select('users.*', 'students.*')
        ->where('groups_members.group_id', $groupId)
        ->get();


        return view('profile.student-profile', compact('user', 'groupInfo', 'groupMembers'));
    }

    /**
     * Update the user's profile information.
     */
    public function student_update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        // dd($request->all());

        $user = User::where('id', Auth::user()->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $student = Students::where('user_id', Auth::user()->id)->update([
            'year' => $request->year,
            'semester' => $request->semester
        ]);

        return Redirect::route('student-profile.edit')->with('success', 'Profile updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function student_destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}


