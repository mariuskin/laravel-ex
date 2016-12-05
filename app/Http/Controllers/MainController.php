<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Owner;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $owners = Owner::all();

        return view('main.index', compact('owners'));

    }

}
