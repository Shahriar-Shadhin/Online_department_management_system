@extends('layouts.main')

@section('title', 'Student Dashboard')
@section('header')
@include('partials.header')
@endsection

{{-- @section('banner_title', 'Student Dashboard') --}}
@section('banner_title')
  {{$name}}
@endsection

@section('content')
<section>
  <div class="content">
    <header>
      <a href="{{route('courses.student', session('id'))}}" class="icon fa-files-o"><span class="label">Icon</span></a>
      <h3>View Courses</h3>
    </header>
    {{-- <p>View All Current Courses</p> --}}
  </div>
</section>
<section>
  <div class="content">
    <header>
      <a href="{{route('result.student', session('id'))}}" class="icon fa-file-text-o"><span class="label">Icon</span></a>
      <h3>View Result</h3>
    </header>
    {{-- <p>View Attendence Result</p> --}}
  </div>
</section>
<section>
  <div class="content">
    <header>
      <a href="{{route('signup.student', session('id'))}}" class="icon fa-pencil-square-o"><span
          class="label">Icon</span></a>
      <h3>Change Password</h3>
    </header>
    {{-- <p>Change User Password</p> --}}
  </div>
</section>
<section>
  <div class="content">
    <header>
      <a href="{{route('updateEmail.student', session('id'))}}" class="icon fa-envelope"><span
          class="label">Icon</span></a>
      <h3>Update Email</h3>
    </header>
    {{-- <p>Update User Email</p> --}}
  </div>
</section>
<section>
  <div class="content">
    <header>
      <a href="{{route('library')}}" class="icon fa-book"><span
          class="label">Icon</span></a>
      <h3>Library</h3>
    </header>
  </div>
</section>
<section>
  <div class="content">
    <header>
      <a href="{{route('routine.student', session('id'))}}" class="icon fa-clock-o"><span
          class="label">Icon</span></a>
      <h3>Routine</h3>
    </header>
  </div>
</section>
<section>
  <div class="content">
    <header>
      <a href="{{route('archive.index.student', session('id'))}}" class="icon fa-file-archive-o"><span
          class="label">Icon</span></a>
      <h3>Archived Files</h3>
    </header>
  </div>
</section>
@endsection