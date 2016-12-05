<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contract;
use App\Owner;
use Illuminate\Http\Request;
use Session;
use Carbon;

class ContractsController extends Controller
{

    
    public function validation_of_file(Request $request){

        $this->validate($request, [
         'start_date' => 'date|required',
         'file' => 'file|mimes:pdf,doc,docx'
         ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contracts = Contract::paginate(25);

        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $owners_lastName = Owner::OrderBy('last_name', 'id')->pluck('last_name', 'id');
        $owners_firstName = Owner::OrderBy('first_name', 'id')->pluck('first_name', 'id');
        $owners = $owners_firstName;
        foreach ($owners as $key => $value) {
            $owners[$key] = "$owners_firstName[$key] $owners_lastName[$key]";
        }
        return view('contracts.create', compact('owners'));
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
        $this->validation_of_file($request);

        $requestData = $request->all();
        

        $mytime = Carbon\Carbon::now()->format('Y_m_d');

        if ($request->hasFile('file')) {
            $uploadPath = storage_path('/uploads/');

            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $mytime . "_"  . rand(111111111, 999999999) . '.' . $extension;

            $request->file('file')->move($uploadPath, $fileName);
            $requestData['file'] = $fileName;
        }


        Contract::create($requestData);

        Session::flash('flash_message', 'Contract added!');

        return redirect('contracts');
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
        $contract = Contract::findOrFail($id);

        return view('contracts.show', compact('contract'));
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
        $contract = Contract::findOrFail($id);

        $owners_lastName = Owner::OrderBy('last_name', 'id')->pluck('last_name', 'id');
        $owners_firstName = Owner::OrderBy('first_name', 'id')->pluck('first_name', 'id');
        $owners = $owners_firstName;
        foreach ($owners as $key => $value) {
            $owners[$key] = "$owners_firstName[$key] $owners_lastName[$key]";
        }
        return view('contracts.edit', compact('contract', 'owners'));
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
        

        $mytime = Carbon\Carbon::now()->format('Y_m_d');

        if ($request->hasFile('file')) {
            $uploadPath = storage_path('/uploads/');

            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $mytime . "_"  . rand(111111111, 999999999) . '.' . $extension;

            $request->file('file')->move($uploadPath, $fileName);
            $requestData['file'] = $fileName;
        }

        $contract = Contract::findOrFail($id);
        $contract->update($requestData);

        Session::flash('flash_message', 'Contract updated!');

        return redirect('contracts');
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
        Contract::destroy($id);

        Session::flash('flash_message', 'Contract deleted!');

        return redirect('contracts');
    }
}
