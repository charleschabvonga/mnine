<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Interest;
use App\Models\Language;
use App\Models\Person;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('admin.people.index', [
            'people' => Person::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.people.edit', [
            'languages' => Language::all(),
            'interests' => Interest::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request) : RedirectResponse
    {
        $input = $request->validated();
        $input['interests'] = json_encode($input['interests']);

        Person::create($input);

        // event being triggered in the Person model 
        // if ($person) {
        //     event(new PersonCreated($person));
        // }

        return redirect()->route('admin.people.index')
            ->withSuccess('New person was added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person) : View
    {
        $interests = Interest::whereIn('id', json_decode($person->interests))->get();
        
        return view('admin.people.show', compact('person', 'interests'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person) : View
    {
        
        $languages = Language::all();
        $query = Interest::query();
        $interests = $query->get();
        $selectedInterests = $query
            ->whereIn('id', json_decode($person->interests))
            ->get();

        return view('admin.people.edit', compact(
            'person',
            'languages',
            'interests',
            'selectedInterests'
        ));
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person) : RedirectResponse
    {
        $input = $request->validated();
        $input['interests'] = json_encode($input['interests']);
        $person->update($input);

        return redirect()->route('admin.people.index')
            ->withSuccess('Person was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person) : RedirectResponse
    {
        $person->delete();

        return redirect()->route('admin.people.index')
                ->withSuccess('Person was deleted successfully.');
    }
}
