<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = DB::table('contacts')
        ->where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->paginate(6);

        return view('contact.index', ['contacts'=> $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
            'note' => 'nullable|string',
        ]);

        $userId = $request->user()->id;
        $validatedData['user_id'] = $userId;

        // Create a new contact with validated data
        $contact = Contact::create($validatedData);

        // Flash a success message
        session()->flash('message', 'Contact created successfully!');

        // Redirect to the contact show page
        return redirect()->route('contact.show', ['contact' => $contact]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contact.show' , ['contact'=> $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit' , ['contact'=> $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
            // Validate the request
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'contact' => 'required|string|max:15',
                'note' => 'nullable|string',
            ]);

            // Attempt to update the contact with validated data
            $contact->update($validatedData);

            // Flash a success message
            session()->flash('message', 'Contact updated successfully!');

            // Redirect to the contact show page
            return redirect()->route('contact.show' , ['contact' => $contact]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        // Delete the contact
        $contact->delete();

        session()->flash('message', 'Contact deleted successfully.');

        // Redirect to the contact index
        return redirect()->route('contact.index');
    }

}
