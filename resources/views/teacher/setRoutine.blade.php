@extends('layouts.main')

@section('title', 'Teacher Dashboard')
@section('header')
  @include('partials.header')
@endsection

@section('banner_title', 'Assigned Courses')

@section('content')

  @if (count($assignedCourses) == 0)
      <section><h2>No Courses found</h2></section>
  @else
    <section>
        <ol>
            @foreach ($assignedCourses as $course)
  
            <li>
                <a 
                href="{{route('routineCourse.teacher', ['id'=> session('id'), 'code'=> $course->course_code])}}"
                class="btn btn-block" 
                @if ($assign != true)
                style="pointer-events: none" 
                @endif
                target="blank">
                    {{$course->course_name . "-" . $course->course_code }}<br>
                </a>
            </li>
          
            @endforeach
        </ol>
    </section>
  @endif
@endsection