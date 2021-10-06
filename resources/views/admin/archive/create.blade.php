@extends('layouts.main')

@section('title', 'Admin Dashboard')
@section('header')
@include('partials.header')
@endsection


@section('banner_title', 'Admin Dashboard')

@section('content')

<section>
    <div>
        @if(session()->has('message'))
            <p style="color: green; text-align:center">{{ session()->get('message') }}</p>
        @endif
    </div>
  <div class="content">
    <form action="{{route('archive.create.admin')}}" method="post">
        @csrf
        <select name="folder" id="">
          <option value="uploads" selected>uploads</option>
          @foreach ($folders as $folder)
          <option value="{{$folder}}">{{$folder}}</option>
          @endforeach
        </select>
        <input type="text" name="name" id="name" placeholder="Folder Name">
        <br>
        <input type="submit" value="Create" class="button primary">
    </form>
  </div>
</section>


@endsection