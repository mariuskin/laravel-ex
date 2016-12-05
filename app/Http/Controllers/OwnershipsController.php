<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ownership;
use App\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class OwnershipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $ownerships = Ownership::paginate(15);

        return view('ownerships.index', compact('ownerships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $cars = Car::OrderBy('state_number', 'id')->pluck('state_number', 'id');
        
        return view('ownerships.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Ownership::create($request->all());

        Session::flash('flash_message', 'Ownership added!');

        return redirect('main');
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
        $ownership = Ownership::findOrFail($id);

        return view('ownerships.show', compact('ownership'));
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
        $ownership = Ownership::findOrFail($id);
        $cars = Car::OrderBy('state_number', 'id')->pluck('state_number', 'id');
        

        return view('ownerships.edit', compact('ownership', 'cars'));
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
        
        $ownership = Ownership::findOrFail($id);
        $ownership->update($request->all());

        Session::flash('flash_message', 'Ownership updated!');

        return redirect("ownerships/$id");
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
        Ownership::destroy($id);

        Session::flash('flash_message', 'Ownership deleted!');

        return redirect('main');
    }
}
