@extends('layouts.main')

@section('title', 'Update Teacher Priority')
@section('header')
@include('partials.header')
@endsection

@section('banner_title', 'Update Teacher Priority')

@section('content')
@php
    if($teachers){
        $numbers = count($teachers);
    }
@endphp
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
<div class="content" style="padding: 1rem; margin: 0 auto; width: 600px; overflow-y: auto;">
    <div class="text-center">
      @if($errors->any())
        <h4 style="color: red; text-align:center">{{$errors->first()}}</h4>
      @endif
      @if(session()->has('message'))
        <h4 style="color: green; text-align:center">{{ session()->get('message') }}</h4>
      @endif
    </div>
        
    <form action="{{route('teacherPriority.admin')}}" method="POST">
        @csrf
        <table>
            <thead>
                <th>Name</th>
                <th>Priority</th>
            </thead>
            <tbody>
                @if ($teachers)
                    @foreach ($teachers as $key => $teacher)
                    <tr>
                        <td><input type="text" name="names[]" value="{{$teacher->teacher_name}}" readonly></td>
                        <td>
                            <select class="custom-select" name="priorities[]" id="time">
                                @for ($i = 1; $i <= $numbers; $i++)
                                    <option>{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                    </tr>
                    @endforeach
                
                @endif
                
            </tbody>
        </table>
        
        <br>
        <button type="submit" class="button primary">Update</button>
    </form>
</div>
   
@endsection