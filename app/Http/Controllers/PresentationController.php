<?php

namespace App\Http\Controllers;

use App\Models\ScheduledPresentations;
use Illuminate\Http\Request;
use App\Models\Presentations;

class PresentationController extends Controller
{
    public function index()
    {
        $presentations = Presentations::all();
        return view('admin.manage-presentation', compact('presentations'));
    }
    public function schedule()
    {
        $presentations = ScheduledPresentations::all();
        return view('admin.schedule-presentation', compact('presentations'));
    }
    public function scheduleStore(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'venue' => 'required|string',
            'presentation' => 'required|string',
            'project' => 'required|string',
        ]);

        // Create a new instance of the ScheduledPresentations model
        $scheduledPresentation = new ScheduledPresentations();

        // Assign values to the attributes of the model instance
        $scheduledPresentation->date = $request->date;
        $scheduledPresentation->time = $request->time;
        $scheduledPresentation->venue = $request->venue;
        $scheduledPresentation->presentation = $request->presentation;
        $scheduledPresentation->project = $request->project;
        $scheduledPresentation->status = 0; // You can set the status here or leave it as per your requirement
        // $scheduledPresentation->send_email_notification = $request->has('send_email_notification');

        // Save the model instance to the database
        $scheduledPresentation->save();

        // Optionally, you can return a response or redirect to a specific route
        return redirect()->back()->with('success', 'Scheduled presentation added successfully');

    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'presentation_name' => 'required|string|max:255',
            'type' => 'required|string|in:Synopsis,Progress,Final',
        ]);

        // Create a new presentation instance
        $presentation = new Presentations();
        $presentation->presentation_name = $request->presentation_name;
        $presentation->type = $request->type;
        // Add other fields if necessary
        $presentation->save();

        // Redirect to the presentations index page with a success message
        return redirect()->route('admin.manage-presentation')->with('success', 'Presentation added successfully');
    }

    public function update(Request $request, Presentations $presentation)
    {
        // Validate the request data
        $request->validate([
            'presentation_name' => 'required|string|max:255',
            'type' => 'required|string|in:Synopsis,Progress,Final',
        ]);

        // Update the presentation using the create method
        $presentation->update([
            'presentation_name' => $request->presentation_name,
            'type' => $request->type,
            // Update other fields if necessary
        ]);

        // Redirect to the presentations index page with a success message
        return redirect()->route('admin.manage-presentation')->with('success', 'Presentation updated successfully');
    }

    public function destroy(Presentations $presentation)
    {
        $presentation->delete();

        // Redirect to the presentations index page with a success message
        return redirect()->route('admin.manage-presentation')->with('success', 'Presentation deleted successfully');
    }
}
