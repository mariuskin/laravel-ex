<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Gate;
use App\User;
use App\Owner;
use App\Section;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class OwnersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $owners = Owner::paginate(15);

        return view('owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $sections = Section::OrderBy('name', 'id')->pluck('name', 'id');

        return view('owners.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Owner::create($request->all());

        Session::flash('flash_message', 'Owner added!');

        return redirect('owners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $owner = Owner::findOrFail($id);

        return view('owners.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {

        $owner = Owner::findOrFail($id);
        $sections = Section::OrderBy('name', 'id')->pluck('name', 'id');


        return view('owners.edit', compact('owner', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        

        $owner = Owner::findOrFail($id);

       $this->authorize('cud', $owner);


        $owner->update($request->all());

        Session::flash('flash_message', 'Owner updated!');

        return redirect('owners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Owner::destroy($id);

        Session::flash('flash_message', 'Owner deleted!');

        return redirect('owners');
    }
}
