@extends('layouts.main')

@section('title', 'Admin Dashboard')
@section('header')
@include('partials.header')
@endsection


@section('banner_title', 'Admin Dashboard')

@section('content')
<section>
  <div class="content">
    <form action="{{route('archive.view.admin')}}" method="post">
        @csrf
        <select class="form-select" name="folder">
                <option selected disabled>Select Folder</option>
                @foreach ($subfolders as $folder)
                    <option value="\{{$folder}}\">{{$folder}}</option>
                @endforeach
                
        </select>
        <br>
        <select class="form-select" name="action">
            <option selected disabled>Select Action</option>
                <option value="delete">Delete</option>
                <option value="view">View</option>
            </select>
        <br>
            <input type="submit" value="Submit" class="button primary">
    </form>
  </div>
</section>


@endsection