<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Class_info;
use App\Models\ClassRoom;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Routine;

class RoutineController extends Controller
{
    public function showRoutine($id){
        
        $student = Student::find($id);
        $pattern = '';
        if($student->student_semester == '1st'){
            $pattern = 'CSE11';
        }elseif($student->student_semester == '2nd'){
            $pattern = 'CSE12';
        }elseif($student->student_semester == '3rd'){
            $pattern = 'CSE21';
        }elseif($student->student_semester == '4th'){
            $pattern = 'CSE22';
        }elseif ($student->student_semester == '5th') {
            $pattern = 'CSE31';
        }elseif ($student->student_semester == '6th') {
            $pattern  = 'CSE32';
        }elseif ($student->student_semester == '7th') {
            $pattern = 'CSE41';
        }elseif ($student->student_semester == '8th') {
            $pattern = 'CSE42';
        }
    
        $data = Routine::where('course_code', 'like', $pattern . '%')->get();
        // dd($pattern);
        
        return view('student.routine', compact('data'));
    }
    public function index(){
        return view('teacher.routine');
    }

    public function viewRoutine($id){
        $RoutineDatas = Routine::all();
        // dd($RoutineDatas);
        
        return view('teacher.viewRoutine', compact('RoutineDatas'));
    }

    public function routine($id){
        $priority = Teacher::find($id);
        $assign = true;
        $assignedCourses = Course::where('course_teacher', $id)->get();
        $routineTeachersIds = [];
        $teachers = [];
        
        if($priority->priority == 1){
            $assign = true;
        }else{
            for($i = $priority->priority - 1 ; $i >= 1; $i--){
                $id = Teacher::select('teacher_username')->where('priority', $i)->first();
                array_push($teachers, $id->teacher_username);
            }

            $routineDisIds = Routine::select('teacher_id')
                                     ->distinct()->get(); 
            foreach ($routineDisIds as $value) {
                array_push($routineTeachersIds, $value->teacher_id);
            }
            
            if(count($routineTeachersIds) == 0){
                $assign = false;
            }else{
                foreach ($teachers as $teacher) {

                    if(array_search($teacher, $routineTeachersIds) === false){
                        $assign = false;
                    }
                    
                }
            }
        }

        if(count($assignedCourses) == 0){
            return \redirect()->back()->withErrors('No courses found');
        }else{
            return view('teacher.setRoutine', compact('assignedCourses', 'assign'));
        }
    }
    public function course($id, $code){
        $course = Course::where('course_code', $code)->first();
        $classRooms = ClassRoom::all();
        $routineDatas = Routine::all();
        // dd($routineDatas);
        $routineUniqueDatas = Routine::distinct()->get(['times', 'rooms', 'days']);
        // dd($routineUniqueDatas);
        
        return view('teacher.routine-course', compact('course', 'classRooms', 'routineDatas', 'routineUniqueDatas'));
    }

    public function setCourse(Request $req, $id){
        $code= $req->input('course-code');
        $course = Course::where('course_code', $code)->first();
        // dd($code);
        $startTimes= $req->input('start-time');
        $endTimes= $req->input('end-time');
        $days= $req->input('day');
        $rooms= $req->input('room'); 
        // dd($rooms);
        $arr = [];
        
        // dd($data);
        for($i = 0; $i<= count($startTimes)-1; $i++){
            $string = $startTimes[$i] . '-'. $endTimes[$i];
            // dd($string);
            $demo = Routine::where([
                // ['course_code', $code],
                ['times', $string],
                ['days', $days[$i]],
                ['rooms', $rooms[$i]]
            ])->get();
            // dd(count($demo));
            if(count($demo) != 0){
                // dd($demo);

                return \redirect()->back()->withErrors('This time or date is RESERVED!');

            }elseif($startTimes[$i] == $endTimes[$i]){
                return \redirect()->back()->withErrors('Start time and End time cannot be same!');
                
            }else{
                // dd("not empty");
                $data = [
                'course_code' => $code,
                'teacher_id' => session('id'),
                'times' => $startTimes[$i] . "-" . $endTimes[$i],
                'days' => $days[$i],
                'rooms' => $rooms[$i]
                ];
                Routine::create($data);
                return \redirect()->route('routine.teacher', session('id'));

            }
            
        }
        // dd($arr);
        

    }
}
