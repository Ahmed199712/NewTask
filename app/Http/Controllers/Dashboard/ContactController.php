<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('Dashboard.pages.contacts.index' , compact('contacts'));
    }

    
    public function create()
    {
        $categories = Category::all();

        return view('Dashboard.pages.contacts.create' , compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|min:3|unique:contacts'
        ]);
        $contact = new Contact;
        $contact->category_id = $request->category_id;
        $contact->name = $request->name;
        $contact->created_by = adminurl()->id;
        $contact->save();

        session()->flash('success', trans('backend.created_successfully'));
        return redirect()->back();
    }

   
    public function show(Contact $contact)
    {
        return view('Dashboard.pages.contacts.show' , compact('contact'));
    }

   
    public function edit(Contact $contact)
    {
        $categories = Category::all();

        return view('Dashboard.pages.contacts.edit' , compact('contact','categories'));
    }

   
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|min:3|unique:contacts,name,'.$contact->id
        ]);
        $contact->category_id = $request->category_id;
        $contact->name = $request->name;
        $contact->updated_by = adminurl()->id;
        $contact->save();

        session()->flash('success', trans('backend.updated_successfully'));
        return redirect()->back();
    }

    
    public function destroy(Contact $contact)
    {
        $contact->delete();

        session()->flash('success', trans('backend.deleted_successfully'));
        return redirect()->back();
    }

    public function activation(Contact $contact)
    {
        if( $contact->status == 1 ){
            $contact->status = 0;
            $contact->save();
            session()->flash('success', trans('backend.record_disabled_successfully'));
            return redirect()->back();
        }else{
            $contact->status = 1;
            $contact->save();
            session()->flash('success', trans('backend.record_actived_successfully'));
            return redirect()->back();
        }
        
    }
}
