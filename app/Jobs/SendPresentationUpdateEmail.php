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
use App\Mail\PresentationNotificationMail;
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

        $project = $presentation->project;

        $project_coordinator = User::where('id', $project->project_coordinator_id)->pluck('name')->first();
        // dd($project_coordinator);

        $groups = Groups::where('project_id', $project->id)->get();

        $groupIds = $groups->pluck('id')->toArray();

        $members = GroupsMembers::with('student.user')->whereIn('group_id', $groupIds)->get();

        foreach ($members as $member) {
            Mail::to($member->student->user->email)->send(new PresentationNotificationMail($presentation, $member->student->user->name, $project_coordinator));
        }
    }
}
