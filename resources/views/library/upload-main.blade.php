@extends('layouts.main')

@section('title', 'Library Dashboard')
@section('header')
  @include('partials.header')
@endsection

@section('banner_title', 'Library Dashboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<section>
    <div class="content">
        <form action="{{route('upload.librarian')}}" method="post" enctype="multipart/form-data">
            @csrf
            <header>
                <input type="file" class="form-control" id="booksFile" name="booksFile" required />
                <h3>Upload Books Information</h3>
            </header>
            <a href="{{route('download.librarian')}}" class="link-success">Download Sample Excel File</a>
            <br>
            <input type="submit" name="submit-book" value="Upload" class="button primary">
        </form>
        
    </div>
</section>


@endsection