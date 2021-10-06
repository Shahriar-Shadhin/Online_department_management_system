@extends('layouts.main')

@section('title', 'Library Dashboard')
@section('header')
  @include('partials.header')
@endsection

@section('banner_title', 'Library Dashboard')

@section('content')
<section>
    <div class="content">
     <form action="{{route('search.librarian')}}" method="post">
        @csrf
         <input type="search" name="search" id="search" placeholder="Book Name" autocomplete="off">
         <br>
         <input type="submit" value="Search" class="button primary">
     </form>
    </div>
</section>


@endsection