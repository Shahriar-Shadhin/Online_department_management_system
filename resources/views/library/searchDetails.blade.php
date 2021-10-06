@extends('layouts.main')

@section('title', 'Library Dashboard')
@section('header')
  @include('partials.header')
@endsection

@section('banner_title', 'Library Dashboard')

@section('content')
@if (count($books) != 0)
    @foreach ($books as $book)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h3 class="card-title">{{$book->name}}</h3>
          <h4 class="card-subtitle mb-2 text-muted">Author: {{$book->author}}</h4>
          <p style="margin: 0" class="card-text">Edition: {{$book->edition}}</p>
          <p style="margin: 0" class="card-text">Year: {{$book->year}}</p>
          <p style="margin: 0" class="card-text">Publisher: {{$book->publisher}}</p>
          <p style="margin: 0" class="card-text">Quantity: {{$book->quantity}}</p>
          {{-- <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a> --}}
        </div>
      </div>
    @endforeach
@else
  <div class="card" style="width: 18rem;">
    <h3>No books found</h3>
  </div>  
@endif

@endsection