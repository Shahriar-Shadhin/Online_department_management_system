@extends('layouts.main')

@section('title', 'Teacher Dashboard')
@section('header')
@include('partials.header')
@endsection


@section('banner_title')
{{'Routine'}}
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<section style="width: auto">
    <div class="content">
        
        <h3 class="text-danger">Reserved</h3>
                <table class="table table-sm">
                    <thead class="text-center">
                        <th>Saturday</th>
                        <th>Sunday</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Rooms</th>
                        
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @foreach ($routineDatas as $routine)
                                @if ($course->course_semester == $routine->course->course_semester)
                                    @if ($routine->days == "Saturday")
                                    {{$routine->times . "-" . $routine->rooms}} <br>
                                    @endif
                                @endif  
                                @endforeach
                            </td>
                            <td>
                                @foreach ($routineDatas as $routine)
                                @if ($course->course_semester == $routine->course->course_semester)
                                    @if ($routine->days == "Sunday")
                                    {{$routine->times . "-" . $routine->rooms}} <br>
                                    @endif
                                @endif  
                                @endforeach
                            </td>
                            <td>
                                @foreach ($routineDatas as $routine)
                                @if ($course->course_semester == $routine->course->course_semester)
                                    @if ($routine->days == "Monday")
                                    {{$routine->times . "-" . $routine->rooms}} <br>
                                    @endif
                                @endif  
                                @endforeach
                            </td>
                            <td>
                                @foreach ($routineDatas as $routine)
                                @if ($course->course_semester == $routine->course->course_semester)
                                    @if ($routine->days == "Tuesday")
                                    {{$routine->times . "-" . $routine->rooms}} <br>
                                    @endif
                                @endif  
                                @endforeach
                            </td>
                            <td>
                                @foreach ($routineDatas as $routine)
                                @if ($course->course_semester == $routine->course->course_semester)
                                    @if ($routine->days == "Wednesday")
                                    {{$routine->times . "-" . $routine->rooms}} <br>
                                    @endif
                                @endif  
                                @endforeach
                            </td>
                            <td>
                                @foreach ($classRooms as $room)
                                    <p>
                                        {{$room->room_number}}: Times <br>
                                        
                                        @foreach ($routineUniqueDatas as $routine)
                                            @if ($room->room_number == $routine->rooms)
                                                
                                                {{$routine->times . '-'. $routine->days}} <br>
                                            @endif
                                        @endforeach
                                    
                                    </p>
                                @endforeach
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
        
        <form action="{{route('routineCourse.teacher', ['id'=> session('id'), 'code'=> $course->course_code])}}" method="post">
            @csrf
            <div>
                <div class="text-center">
                    @if($errors->any())
                      <h4 style="color: red; text-align:center">{{$errors->first()}}</h4>
                    @endif
                    @if(session()->has('message'))
                      <h4 style="color: green; text-align:center">{{ session()->get('message') }}</h4>
                    @endif
                  </div>
            </div>
            <div class="container">
                <table class="table table-sm">
                    <tbody>
                            <tr style="color: blue">
                                <td style="padding: 0">
                                    <p style="margin: 0">{{$course->course_name}}<br/> {{$course->course_code}}</p>
                                    <input type="hidden" name="course-code" readonly value="{{$course->course_code}}" id="course-code">
                                </td>
                                <td>
                                    <p style="margin: 0">Start Time</p>
                                </td>
                                <td>
                                    <p style="margin: 0">End Time</p>
                                </td>
                                <td>
                                    <p style="margin: 0">Day</p>
                                </td>
                                <td>
                                    <p style="margin: 0">Room</p>
                                </td>
                            </tr>
                            @if ($course->course_credit == 3.0 || $course->course_credit == 1.50)
                            @php
                                $days = 3;
                            @endphp
                            @endif
                            @if ($course->course_credit == 2.0 || $course->course_credit == 1.0)
                            @php
                                $days = 2;
                            @endphp
                            @endif
                            @if ($course->course_credit == 0.75)
                            @php
                                $days = 1;
                            @endphp
                            @endif
                                    
                                @for ($i = 1; $i <= $days; $i++)
                                <tr>
                                    <td><p style="margin: 0; color: green;">{{$i}}</p></td>
                                <td>
                                    <select type="text" class="" name="start-time[]" id="routine-time" required>
                                        <option value="8AM">8 AM</option>
                                        <option value="9AM">9 AM</option>
                                        <option value="10AM">10 AM</option>
                                        <option value="11AM">11 AM</option>
                                        <option value="12PM">12 PM</option>
                                        <option value="2PM">2 PM</option>
                                        <option value="3PM">3 PM</option>
                                        <option value="4PM">4 PM</option>
                                        <option value="5PM">5 PM</option>
                                        <option value="6PM">6 PM</option>
                                        
                                    </select>
                                </td>
                                <td>
                                    <select type="text" class="" name="end-time[]" id="routine-time" required>
                                        
                                        <option value="8AM">8 AM</option>
                                        <option value="9AM">9 AM</option>
                                        <option value="10AM">10 AM</option>
                                        <option value="11AM">11 AM</option>
                                        <option value="12PM">12 PM</option>
                                        <option value="2PM">2 PM</option>
                                        <option value="3PM">3 PM</option>
                                        <option value="4PM">4 PM</option>
                                        <option value="5PM">5 PM</option>
                                        <option value="6PM">6 PM</option>
                                    </select>
                                </td>
                                <td>
                                    <select type="text" class="" name="day[]" id="routine-day" required>
                                        
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="room[]" id="">
                                        @foreach ($classRooms as $classRoom)
                                            <option value="{{$classRoom->room_number}}">{{$classRoom->room_number}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                </tr>        
                                @endfor
                    </tbody>
                </table>
                
                <br>
                <button 
                    type="submit" 
                    class="button primary"
                    >Assign
                </button>
            </div>
              
        </form>
    </div>
  </section>
@endsection