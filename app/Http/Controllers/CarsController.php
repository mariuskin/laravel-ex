<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Gate;
use App\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Owner;
use Input;

class CarsController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return void
     */
public function index()
{
    $cars = Car::paginate(15);

    return view('cars.index', compact('cars'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $owners_lastName = Owner::OrderBy('last_name', 'id')->pluck('last_name', 'id');
        $owners_firstName = Owner::OrderBy('first_name', 'id')->pluck('first_name', 'id');
        $owners = $owners_firstName;
        foreach ($owners as $key => $value) {
            $owners[$key] = "$owners_firstName[$key] $owners_lastName[$key]";
        }
        return view('cars.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {

        Car::create($request->all());

        Session::flash('flash_message', 'Car added!');

        return redirect('cars');
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
        $car = Car::findOrFail($id);

        return view('cars.show', compact('car'));
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
        $car = Car::findOrFail($id);
        
        $owners_lastName = Owner::OrderBy('last_name', 'id')->pluck('last_name', 'id');
        $owners_firstName = Owner::OrderBy('first_name', 'id')->pluck('first_name', 'id');
        $owners = $owners_firstName;
        foreach ($owners as $key => $value) {
            $owners[$key] = "$owners_firstName[$key] $owners_lastName[$key]";
        }

        return view('cars.edit', compact('car', 'owners'));
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

        $car = Car::findOrFail($id);

        /*if(Input::file())
        {
  
            $image = Input::file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = storage_path('app/profilepics/' . $filename);
 
        
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $user->image = $filename;
                $user->save();
           }
*/

        dd($request->image);

        $car->update($request->all());

        Session::flash('flash_message', 'Car updated!');

        return redirect('main');
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
        Car::destroy($id);

        Session::flash('flash_message', 'Car deleted!');

        return redirect('cars');
    }
}
