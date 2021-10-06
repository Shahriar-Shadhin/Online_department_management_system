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
      <table>
          <thead>
              <tr>
                <th colspan="3">Files</th>
              </tr>
          </thead>
          <tbody>
              @if (count($fileNames) != 0)
                @foreach ($fileNames as $key => $fileName)
                <tr>
                    <td>{{$key+ 1}}</td>
                    <td>{{$fileName}}</td>
                    <td>
                        <a href="{{route('archive.deletefile.admin', $filePath . DIRECTORY_SEPARATOR . $fileName)}}" class="button primary small">Delete</a>
                    </td>
                </tr>
                @endforeach
              @else
                  <tr>
                      <td>No files found</td>
                  </tr>
              @endif
              
          </tbody>
      </table>
  </div>
</section>


@endsection