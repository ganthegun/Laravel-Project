<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Expert;
use App\Models\Publication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ExpertController extends Controller
{


    // Method to handle form submission
    public function createExpert(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'origin' => 'required|string|max:255',
        ]);

        // Create a new Expert instance with the validated data
        $expert = new Expert();
        $expert->name = $validatedData['name'];
        $expert->domain = $validatedData['domain'];
        $expert->email = $validatedData['email'];
        $expert->origin = $validatedData['origin'];
        $expert->user_id = Auth::id(); // Set the current user ID

        // Save the Expert instance to the database
        $expert->save();

        // Redirect to a success page or any other action
        return redirect()->route('expert.myExpertList')->with('success', 'Expert created successfully');
    }

    public function detailExpert($id)
    {
        // Retrieve the expert based on the provided ID
        $expert = Expert::where('expert_id', $id)->with('publications')->firstOrFail();

        // Debugging statements
        // dd($expert->expert_id); // Output the expert's ID
        // dd($expert->publications); // Output the publications associated with the expert
        // dd($publication);
        
        // Return the view with the expert and associated publications
        return view('expert.detailExpert', compact('expert'));
    }

    public function expertList() // list of expert
    {
        $expert = Expert::where('user_id', '!=', Auth::id())->get();
        return view('expert.expertList', compact('expert'));
    }

    public function myExpertList() // list of my expert
    {
        $expert = Expert::where('user_id', Auth::id())->get();
        // return view('expert.myExpertList', compact('expert'));

        $totalExperts = $expert->count();
        // $totalPublications = Publication::whereIn('owner_id', $expert->pluck('id'))->count();

        $totalPublications = Publication::whereIn('owner_id', $expert->pluck('expert_id'))->count();

        return view('expert.myExpertList', compact('expert', 'totalExperts', 'totalPublications'));


    }

    public function updateExpert(Request $request, $id) // check expert existence before edit form
    {
        $expert = Expert::where('expert_id', $id)->firstOrFail();
        
        // Check if expert exists
        if (!$expert) {
            // Handle the case where expert is not found
            return redirect()->route('expert.myExpertList')->with('error', 'Expert not found.');
        }

        return view('expert.updateExpert', compact('expert'));
    }

    public function update(Request $request, $id) // update expert data
    {
        $expert = Expert::where('expert_id', $id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'origin' => 'required|string|max:255',
        ]);

        $expert->name = $request->input('name');
        $expert->domain = $request->input('domain');
        $expert->email = $request->input('email');
        $expert->origin = $request->input('origin');
        $expert->save();

        return redirect()->route('expert.detailExpert', ['id' => $id])->with('status', 'Expert updated successfully!');
    }

    public function confirmRemove($id)
    {
        $expert = Expert::findOrFail($id);
        return view('expert.confirmRemove', compact('expert'));
    }

    public function destroy($id)
    {
        $expert = Expert::findOrFail($id);
        $expert->delete();

        return redirect()->route('expert.myExpertList')->with('success', 'Expert removed successfully');
    }

    public function createPublication($id)
    {
        $expert = Expert::findOrFail($id);
        return view('expert.publication.addPublication', compact('expert'));
    }


    public function store(Request $request)
    {
        // Log the request data for debugging
        Log::info('Store method called', $request->all());
    
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'type' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'expert_id' => 'required|exists:expert,expert_id'
        ]);
    
        // Log the validated data
        Log::info('Validated data', $validatedData);
    
        // Create a new Publication instance with the validated data
        $publication = new Publication();
        $publication->title = $validatedData['title'];
        $publication->year = $validatedData['year'];
        $publication->type = $validatedData['type'];
        $publication->owner_id = $validatedData['expert_id'];
        $publication->owner_type = 'Expert';
    
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('publications');
            $publication->file = basename($filePath);
        }
    
        $publication->save();
    
        // Log the success message
        Log::info('Publication saved successfully', ['publication_id' => $publication->id]);
    
        return redirect()->route('expert.detailExpert', ['id' => $validatedData['expert_id']])->with('success', 'Publication added successfully.');
    }

    public function viewPublication($id)
    {
        $publication = Publication::findOrFail($id);
        $expert = Expert::find($publication->owner_id); // Fetch the expert associated with the publication
        return view('expert.publication.viewPublication', compact('publication','expert'));
    }

    public function editPublication($id)
    {
        $publication = Publication::findOrFail($id);
        return view('expert.publication.editPublication', compact('publication'));
    }

    public function updatePublication(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'type' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $publication->title = $request->input('title');
        $publication->year = $request->input('year');
        $publication->type = $request->input('type');

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('publications');
            $publication->file = basename($filePath);
        }

        $publication->save();

        return redirect()->route('expert.publication.viewPublication', ['id' => $id])->with('success', 'Publication updated successfully.');
    }

    public function confirmDelete($id)
    {
        $publication = Publication::findOrFail($id);
        return view('expert.publication.confirmDelete', compact('publication'));
    }

    public function delete($id)
    {
        $publication = Publication::findOrFail($id);
        $expert_id = $publication->owner_id; // Assuming the owner_id is the expert_id
        $publication->delete();

        return redirect()->route('expert.detailExpert', ['id' => $expert_id])->with('success', 'Publication removed successfully.');
}



}
