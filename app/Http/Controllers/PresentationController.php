<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use App\Models\Presentations;
use App\Models\ScheduledPresentations;
use App\Jobs\SendPresentationUpdateEmail;

class PresentationController extends Controller
{
    public function index()
    {
        $presentations = Presentations::join('projects', 'projects.id', '=', 'presentations.project_id')
            ->select('presentations.*', 'projects.project_name as project_name', 'projects.id as project_id')
            ->paginate(10);

        $projects = Projects::all();
        return view('admin.manage-presentation', compact('presentations', 'projects'));
    }
    public function addPresentation(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'venue' => 'required|string',
            'presentation' => 'required|string',
            'project' => 'required|integer',
        ]);

        // Create a new instance of the ScheduledPresentations model
        $presentation = new Presentations();

        // Assign values to the attributes of the model instance
        $presentation->date = $request->date;
        $presentation->time = $request->time;
        $presentation->venue = $request->venue;
        $presentation->name = $request->presentation;
        $presentation->project_id = $request->project;
        $presentation->type = 'Progress';
        $presentation->status = 0; // You can set the status here or leave it as per your requirement
        // $presentation->send_email_notification = $request->has('send_email_notification');

        // Save the model instance to the database
        $presentation->save();

        // Optionally, you can return a response or redirect to a specific route
        return redirect()->back()->with('success', 'Presentation added successfully');

    }
    public function updatePresentation(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'venue' => 'required|string',
            'presentation_name' => 'required|string',
            'project_id' => 'required|integer',
            'status' => 'required|integer',
        ]);

        if ($request->has('allow_file_upload'))
            $request->allow_file_upload = 1;
        else
            $request->allow_file_upload = 0;

        // Create a new instance of the ScheduledPresentations model
        // Presentations::where('id', $request->presentation_id)->update([
        //     'date' => $request->date,
        //     'time' => $request->time,
        //     'venue' => $request->venue,
        //     'name' => $request->presentation_name,
        //     'project_id' => $request->project_id,
        //     'type' => 'Progress',
        //     'status' => $request->status, // You can set the status here or leave it as per your requirement
        //     'allow_file_upload' => $request->allow_file_upload, // You can set the status here or leave it as per your requirement
        //     // 'send_email_notification' => $request->has('send_email_notification'), // Uncomment if needed
        // ]);

        // Dispatch a job to send emails to users in the background
        SendPresentationUpdateEmail::dispatch($request->presentation_id);

        // Optionally, you can return a response or redirect to a specific route
        return redirect()->back()->with('success', 'Presentation details updated successfully');
    }

    public function destroy(Presentations $presentation)
    {
        $presentation->delete();

        // Redirect to the presentations index page with a success message
        return redirect()->route('admin.manage-presentation')->with('success', 'Presentation deleted successfully');
    }
}
