@extends('layouts.main')

@section('title', 'Library')
@section('header')
 <header id="header">
		<a class="logo" href="/">Student Attendance System</a>
</header>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('banner_title', 'Library')

@section('search')
    <div>
        <form action="{{route('library.search')}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="search" class="form-control" placeholder="Book Name" name="book-name">
                <div class="input-group-append">
                  <input class="button primary" type="submit" value="Search">
                </div>
              </div>
        </form>
    </div>
@endsection

@section('content')

    @foreach ($books as $book)
        
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">{{$book->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$book->author}}</h6>
            <p class="card-text">Edition: {{$book->edition}}</p>
            <p class="card-text">Year: {{$book->year}}</p>
            <p class="card-text">Publisher: {{$book->publisher}}</p>
            <p class="card-text">Quantity: {{$book->quantity}}</p>

            {{-- <a href="{{route('library.details', $book->id)}}" class="btn btn-outline-primary">View</a> --}}
            {{-- <a href="#" class="card-link">Another link</a> --}}
            </div>
        </div>
       
    @endforeach

{{ $books->links() }}

@endsection