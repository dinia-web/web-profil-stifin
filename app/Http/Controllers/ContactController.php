<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        $contact->update(['status' => 'read']);
        return view('contacts.show', compact('contact'));
    }

    public function create()
{
    return view('contacts.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:100',
        'message' => 'required|string',
        'subject' => 'nullable|string|max:150',
        'phone' => 'nullable|string|max:20',
    ]);

    \App\Models\Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'phone' => $request->phone,
        'status' => 'new',
    ]);

    return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
}


    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
