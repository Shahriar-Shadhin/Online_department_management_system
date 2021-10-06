@extends('layouts.main')

@section('title', 'Admin Dashboard')
@section('header')
@include('partials.header')
@endsection


@section('banner_title', 'Admin Dashboard')

@section('content')
<section>
  <div class="content">
    <header>
      <a href="{{route('archive.create.admin')}}" class="icon fa-folder-o"><span class="label">Icon</span></a>
      <h3>Create Folder</h3>
    </header>
  </div>
</section>
<section>
  <div class="content">
    <header>
      <a href="{{route('archive.upload.admin')}}" class="icon fa-upload"><span class="label">Icon</span></a>
      <h3>Upload Files</h3>
    </header>
  </div>
</section>
<section>
  <div class="content">
    <header>
      <a href="{{route('archive.view.admin')}}" class="icon fa-trash-o"><span class="label">Icon</span></a>
      <h3>View & Delete</h3>
    </header>
  </div>
</section>

@endsection