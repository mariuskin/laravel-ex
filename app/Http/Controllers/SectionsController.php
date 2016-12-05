<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Gate;
use App\Department;
use App\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Input;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sections = Section::paginate(25);

        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $departments = Department::OrderBy('name', 'id')->pluck('name', 'id');

        return view('sections.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Section::create($requestData);

        Session::flash('flash_message', 'Section added!');

        return redirect('sections');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $section = Section::findOrFail($id);

        return view('sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $section = Section::findOrFail($id);

        $departments = Department::OrderBy('name', 'id')->pluck('name', 'id');

        

        return view('sections.edit', compact('section', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $section = Section::findOrFail($id);
        $section->update($requestData);

        Session::flash('flash_message', 'Section updated!');

        return redirect('sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Section::destroy($id);

        Session::flash('flash_message', 'Section deleted!');

        return redirect('sections');
    }
}
