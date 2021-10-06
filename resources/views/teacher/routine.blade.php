@extends('layouts.main')

@section('title', 'Teacher Dashboard')
@section('header')
@include('partials.header')
@endsection


@section('banner_title')
{{'Routine'}}
@endsection

@section('content')
<section>
    <div class="content">
      <header>
        <a href="{{route('routine.view.teacher', session('id'))}}" class="icon fa-eye"><span class="label">Icon</span></a>
        {{-- <h1>{{session('id')}}</h1> --}}
        <h3>View Routine</h3>
      </header>
    </div>
  </section>
  
  <section>
    <div class="content">
      <header>
        <a href="{{route('setRoutine.teacher', session('id'))}}" class="icon fa-pencil-square-o"><span
            class="label">Icon</span></a>
        <h3>Set Routine</h3>
      </header>
    </div>
  </section>
@endsection