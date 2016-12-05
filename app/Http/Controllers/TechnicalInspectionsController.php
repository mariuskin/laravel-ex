<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TechnicalInspection;
use App\Owner;
use App\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TechnicalInspectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $technicalinspections = TechnicalInspection::paginate(15);

        return view('technical-inspections.index', compact('technicalinspections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $cars = Car::OrderBy('state_number', 'id')->pluck('state_number', 'id');

        $owners_lastName = Owner::OrderBy('last_name', 'id')->pluck('last_name', 'id');
        $owners_firstName = Owner::OrderBy('first_name', 'id')->pluck('first_name', 'id');
        $owners = $owners_firstName;
        foreach ($owners as $key => $value) {
            $owners[$key] = "$owners_firstName[$key] $owners_lastName[$key]";
        }

        return view('technical-inspections.create', compact('owners', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        TechnicalInspection::create($request->all());

        Session::flash('flash_message', 'TechnicalInspection added!');

        return redirect('technical-inspections');
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
        $technicalinspection = TechnicalInspection::findOrFail($id);

        return view('technical-inspections.show', compact('technicalinspection'));
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
        $technicalinspection = TechnicalInspection::findOrFail($id);
        $cars = Car::OrderBy('state_number', 'id')->pluck('state_number', 'id');
        

        $owners_lastName = Owner::OrderBy('last_name', 'id')->pluck('last_name', 'id');
        $owners_firstName = Owner::OrderBy('first_name', 'id')->pluck('first_name', 'id');
        $owners = $owners_firstName;
        foreach ($owners as $key => $value) {
            $owners[$key] = "$owners_firstName[$key] $owners_lastName[$key]";
        }


        return view('technical-inspections.edit', compact('technicalinspection', 'owners', 'cars'));
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
        
        $technicalinspection = TechnicalInspection::findOrFail($id);

        $recent_check =  $request->input('recent_check');
        $all = $request->all();
        $all = array_add($all, 'dates', "$technicalinspection->dates $recent_check, ");
        

        
        $technicalinspection->update($all);
        Session::flash('flash_message', 'TechnicalInspection updated!');

        return redirect('technical-inspections');
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
        TechnicalInspection::destroy($id);

        Session::flash('flash_message', 'TechnicalInspection deleted!');

        return redirect('technical-inspections');
    }
}
