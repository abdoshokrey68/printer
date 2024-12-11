<?php

namespace App\Http\Controllers;

use App\Models\Natonality;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function index () {
        $persons = Person::get();
        return view('persons.table', compact('persons'));
    }
    
    public function show ($person_id) {
        $person = Person::findOrFail($person_id);
        return view('persons.show', compact('person'));
    }
    
    public function eidt ($person_id) {
        $person = Person::findOrFail($person_id);
        return view('persons.edit', compact('person'));
    }
    
    public function update (Request $request, $person_id) {
        $request->validate([
    
        ]);
        $person = Person::findOrFail($person_id);
        $person->update($request->all());
        return view('persons.index')->with('success', 'Person Updated Successfully');
    }
    
    public function create () {
        $natonalities = Natonality::get();
        return view('persons.create', compact('natonalities'));
    }
    
    
    public function store (Request $request) {
        Person::create($request->all());
        return redirect()->back()->with('success', 'Person Created Successfully');
    }
    
    public function delete ($person_id)
    {
        return redirect()->back()->with('success', 'Person Deleted Successfully');
    }
}
