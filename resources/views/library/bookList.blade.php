@extends('layouts.main')

@section('title', 'Library Dashboard')
@section('header')
  @include('partials.header')
@endsection

@section('banner_title', 'Library Dashboard')

@section('content')
<section style="width: auto !important">
    <div class="content" style="margin: 0 auto; height: auto; padding: 5px;">
        <div class="display-info">
            <div class="details" style="overflow-y: auto; max-height: 400px; max-width: 600px;">
                <h5 style="color: green">
                    @if (session('message'))
                        {{session('message')}}
                    @endif
                </h5>
                <table>
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Author</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($books) == 0)
                          <tr>
                              <td colspan="3">No Books found</td>
                          </tr>
                        @else
                          @foreach ($books as $key => $book)
                              <tr>
                                  <td>{{$key + 1}}</td>
                                  <td>{{$book->name}}</td>
                                  <td>{{$book->author}}</td>
                                  <td>
                                      <a class="button small secondary" href="{{route('update.librarian', $book->id)}}">Update</a>
                                      <a class="button small primary" href="{{route('delete.librarian', $book->id)}}">Delete</a>
                                  </td>
                              </tr>
                          @endforeach
                          
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection