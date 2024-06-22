<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    //
    public function create()
    {
        $teacher = DB::table('teachers')->find(2);


        return view("teachers", compact("teachers"));
    }
    public function store(Request $request)
    { {
            DB::table('teachers')->insert([
                'name' => $request->name,
                'phone ' => $request->phone,
                'addres' => $request->addres,
                'email' => $request->email,
                'status' => 0
            ]);
            return redirect('/teachers');
        }
    }
}
