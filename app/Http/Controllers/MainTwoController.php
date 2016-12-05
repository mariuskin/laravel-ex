<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Car;


class MainTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cars = Car::all();

        return view('main2.index', compact('cars'));

    }

}
