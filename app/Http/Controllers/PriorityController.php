<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\User;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;


class PriorityController extends Controller
{
    public function store(Request $req){
        
        $names = $req->input('names');
        $priorities = $req->input('priorities');
        
        for($i = 0; $i<=count($names) - 1; $i++){
            Teacher::where('teacher_name', $names[$i])
                    ->update(['priority' => $priorities[$i]]);
        }

        return redirect()->back()->with('message','priorities are successfully updated');
    }
    public function index(){
        $teachers = Teacher::all();
        
        if(count($teachers) == 0){
        
            return redirect()->back()->withErrors('No Teacher Found');
        }else{
            return view('admin.teacherPriority', compact('teachers'));
        }
    }
}
