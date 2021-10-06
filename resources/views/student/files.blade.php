@extends('layouts.main')

@section('title', 'Student Dashboard')
@section('header')
@include('partials.header')
@endsection


@section('banner_title')
Files
@endsection

@section('content')
<section>
    
  <div class="content">
    <form action="{{route('archive.view.student', session('id'))}}" method="post">
        @csrf
        <select class="form-select" name="folder">
                <option selected disabled>Select Folder</option>
                @foreach ($subfolders as $folder)
                    <option value="\{{$folder}}\">{{$folder}}</option>
                @endforeach
                
        </select>
        <br>
        <input type="submit" value="View" class="button primary">
    </form>
    @if (isset($fileNames))
        <table>
            <thead>
                <tr>
                    <th>Files</th>
                </tr>
            </thead>
            <tbody>
                @if ($fileNames == null)
                    <tr>
                        <td>No files found</td>
                    </tr>
                @else
                @foreach ($fileNames as $fileName)
                <tr>
                    <td>
                        @php
                            $path = $filePath . DIRECTORY_SEPARATOR . $fileName;
                        @endphp
                        <p>{{$fileName}}</p>
                    </td>
                </tr>
                @endforeach
                @endif
                
                
            </tbody>
        </table>
    @else
        
    @endif
  </div>
</section>

@endsection