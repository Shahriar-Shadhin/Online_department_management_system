@extends('layouts.main')

@section('title', 'Admin Dashboard')
@section('header')
@include('partials.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection


@section('banner_title', 'Admin Dashboard')

@section('content')
<section>
  <div class="content">
    <div class="text-center">
        @if($errors->any())
          <h4 style="color: red; text-align:center">{{$errors->first()}}</h4>
        @endif
        @if(session()->has('message'))
          <p style="color: green; text-align:center">{{ session()->get('message') }}</p>
        @endif
      </div>
    <form action="{{route('archive.upload.admin')}}" method="post" enctype="multipart/form-data">
        @csrf
        <select class="form-select" name="folder">
                <option selected disabled>Select Folder</option>
                @foreach ($subfolders as $folder)
                    <option value="\{{$folder}}">{{$folder}}</option>
                @endforeach
                
        </select>
        {{-- <input type="text" name="sub-folder" placeholder="Write Sub Folder"> --}}
        <div class="mb-3">
            <br>
            {{-- <label for="file" class="form-label">Upload File</label> --}}
            <input class="form-control" type="file" id="file" name="file">
        </div>
        <input type="submit" value="Upload" class="button primary">
    </form>
  </div>
</section>


@endsection