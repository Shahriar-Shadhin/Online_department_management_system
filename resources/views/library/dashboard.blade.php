@extends('layouts.main')

@section('title', 'Library Dashboard')
@section('header')
  @include('partials.header')
@endsection

@section('banner_title', 'Library Dashboard')

@section('content')
<section>
    <div class="content">
      <header>
        <a href="{{route('upload.librarian')}}" class="icon fa-database"><span class="label">Icon</span></a>
        <h3>Upload Books Info</h3>
      </header>
    </div>
</section>
<section>
    <div class="content">
      <header>
        <a href="{{route('booksList.librarian')}}" class="icon fa-files-o"><span class="label">Icon</span></a>
        
        <h3>Update/Delete Books Info</h3>
      </header>
    </div>
</section>
<section>
    <div class="content">
      <header>
        <a href="{{route('passwordReser.librarian', session('id'))}}" class="icon fa-pencil-square-o"><span class="label">Icon</span></a>
        
        <h3>Update Password</h3>
      </header>
    </div>
</section>
<section>
  <div class="content">
    <header>
      <a href="{{route('search.librarian')}}" class="icon fa-search"><span class="label">Icon</span></a>
      
      <h3>Search Books</h3>
    </header>
  </div>
</section>

@endsection