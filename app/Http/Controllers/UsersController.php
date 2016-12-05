<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Hash;

class UsersController extends Controller
{

    public function changeLanguage(Request $request, $id){

        $user = User::findOrFail($id);
        $user->update($request->all());


        Session::flash('flash_message', 'User updated!');

        return redirect('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the new password length...

        $user->fill([
            'password' => Hash::make($request->password)
        ])->save();
    }

        $user = User::create($request->all());


        updatePassword($request, $user->id);

        Session::flash('flash_message', 'User added!');

        return redirect('admin/users');
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
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
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
        
        $user = User::findOrFail($id);
        $user->update($request->all());


        Session::flash('flash_message', 'User updated!');

        return redirect('admin/users');
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
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('admin/users');
    }
}
