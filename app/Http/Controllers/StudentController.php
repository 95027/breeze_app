<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function create(){
        return view('student.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'file' => 'required',
            'message' => 'required',
        ]);

        $userid = Auth()->user()->id;
        $name = request('name');
        $email = request('email');
        $phone = request('phone');
        $message = request('message');
        // filename
        $file = request('file');
        $extension = $file->extension();
        $filename = $file . time(). $extension;
        $file->move(public_path('resumes'), $filename);

        Student::create([
            'userid' => $userid,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
            'file' => $filename,
        ]);

        return redirect()->route('home')->with('message', 'Data inserted successfully');
    }

    public function edit($id){
        $student = Student::find($id);

        return view('student.edit', compact('student'));
    }

    public function update(){
        $id = request('id');
        $student = Student::find($id);
        $student -> update([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'file' => request('file'),
            'message' => request('message'),
        ]);

        return redirect()->route('home')->with('message', 'Data updated successfully');
    }
    
    public function delete($id){
        $student = Student::find($id);
        
        $student ->delete();
        return redirect()->route('home')->with('message', 'Data updated successfully');
    }
}
