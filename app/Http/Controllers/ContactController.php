<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $contacts = Contact::get();
        $id = 'auth'::id();
        $contacts = Contact::where('user_id', $id)->paginate(100);
        return view('contacts.index')->with('storedContacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['contactName' => 'required|min:2|max:255', 'contact' => 'required|numeric|unique:contacts']);
        $contact = new Contact;
        $contact->user_id = $request->user_id;
        $contact->name = $request->contactName;
        $contact->contact = $request->contact;

        $contact->save();

        Session::flash('success', 'New Contact has been sucessfully added.');

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $this->authorize('update', $contact);
        $contact = Contact::find($contact->id);
        return view('contacts.update')->with('editedContact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $this->authorize('update', $contact);
        // if(count(Contact::all()) > 2) {
        $this->validate($request, ['updatedName' => 'required|min:2|max:255', 'contact' => 'required|numeric|unique:contacts']);
        $contact = Contact::find($contact->id);
        $contact->name = $request->updatedName;
        $contact->contact = $request->contact;
        $contact->save();
        Session::flash('success', 'Contact #' . $contact->id . ' has been successfully updated.');
        return redirect()->route('contacts.index');
        // } else {
        // return redirect()->route('contacts.index');
        // }
        // return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {

        $res = Contact::where('id', $contact->id)->delete();

        Session::flash('success', 'Contact #' . $contact->id . ' has been successfully deleted.');

        // $contact = Contact::find($contact);

        // $contact->delete();

        return redirect()->route('contacts.index');
    }
}
