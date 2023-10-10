<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home(){
        //$students = Student::latest()->get();

        if(Auth::id()){
            $usertype = auth()->user()->usertype;
            $currStudent = Auth()->user()->id;
            if($usertype == "user"){
                $students = Student::where('userid', $currStudent)->get();
                return view('dashboard', compact('students'));
            }
            elseif($usertype == "admin"){
                $students = Student::latest()->paginate(5);

                return view('admin.index', compact('students'));
            }
            else{
                return redirect()->back();
            }
        }
    }
}
