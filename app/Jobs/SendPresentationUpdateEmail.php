<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\TestMail;
use App\Models\Groups;
use App\Models\GroupsMembers;
use App\Models\Presentations;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendPresentationUpdateEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $presentationId;

    public function __construct($presentationId)
    {
        $this->presentationId = $presentationId;
    }

    public function handle()
    {
        // Retrieve presentation details
        // $presentation = Presentations::findOrFail($this->presentationId);
        // $users = Presentations::with('project')->where('id', $this->presentationId)->get();
        $presentation = Presentations::with('project')->findOrFail($this->presentationId);
        // dd($presentation);

        $project = $presentation->project;

        $groups = Groups::where('project_id', $project->id)->get();

        $groupIds = $groups->pluck('id')->toArray();

        $members = GroupsMembers::with('student.user')->whereIn('group_id', $groupIds)->get();
        // dd($members[0]->student->user->email);
        // // Send email to each user
        foreach ($members as $member) {
            // dd($member->student->user->email);
            // Mail::to($member->student->user->email)->send(new TestMail($presentation, $member->student->user->name));
            Mail::to('ritik456958@gmail.com')->send(new TestMail($presentation, $member->student->user->name));
        }
    }
}
