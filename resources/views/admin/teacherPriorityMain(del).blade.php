@extends('layouts.main')

@section('title', 'Update Teacher Priority')
@section('header')
@include('partials.header')
@endsection

@section('banner_title', 'Update Teacher Priority')

@section('content')
{{-- @php
    if($teachers){
        $numbers = count($teachers);
    }
@endphp --}}
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
    
    <form action="{{route('filterTeachers.admin')}}" method="post">
        @csrf
            <select class="custom-select" name="dept" id="dept">
                <option disabled selected>Choose...</option>
                <option value="CSE">CSE</option>
                <option value="ICT">ICT</option>
                <option value="TEX">TEX</option>
                <option value="MATH">MATH</option>
                <option value="PHY">PHY</option>
                <option value="CHEM">CHEM</option>
                <option value="ESRM">ESRM</option>
                <option value="FTNS">FTNS</option>
                <option value="BGE">BGE</option>
                <option value="ECO">ECO</option>
                <option value="BBA">BBA</option>
                <option value="CPS">CPS</option>
            </select>
            <hr>
            <button class="button primary" type="submit">Submit</button> 
    </form>
</div>
   
@endsection