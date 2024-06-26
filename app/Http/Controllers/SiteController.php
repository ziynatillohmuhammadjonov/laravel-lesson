<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function home(){
        return view("home");
    }

    public function about(){
        return view("about");
    }

    public function components(){
        $regions =['Tashkent', 'Fargona', 'Andijon'];
        return view("components", compact('regions'));
    }
    //
    public function index(){
        return view("welcome");
    }

    public function users(){
        return view("users");
    }
    public function create(Request $request){
        dd($request->query('test'));
        return view("users");
    }

    public function store(Request $request){
        // dd($request->path());//yo'lini olib beradi.
        dd($request->all());//barcha inutlarni qiymatlarini olib beradi.
    }
}
