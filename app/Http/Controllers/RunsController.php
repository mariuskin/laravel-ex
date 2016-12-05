<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Run;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class RunsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $runs = Run::paginate(15);

        return view('runs.index', compact('runs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('runs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Run::create($request->all());

        Session::flash('flash_message', 'Run added!');

        return redirect('runs');
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
        $run = Run::findOrFail($id);

        return view('runs.show', compact('run'));
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
        $run = Run::findOrFail($id);

        return view('runs.edit', compact('run'));
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
        
        $run = Run::findOrFail($id);
        $run->update($request->all());

        Session::flash('flash_message', 'Run updated!');

        return redirect('runs');
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
        Run::destroy($id);

        Session::flash('flash_message', 'Run deleted!');

        return redirect('runs');
    }
}
