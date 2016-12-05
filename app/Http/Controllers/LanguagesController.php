<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\User;


class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $user = Auth::user();

        return view('languages.edit', compact('user'));

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

        return redirect("admin");
    }

}
