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
            {{-- <div class="details" style="overflow-y: auto; max-height: 400px; max-width: 600px;"> --}}
                <form action="{{route('update.librarian', $book->id)}}" method="post">
                    @csrf
                    
                    <table>
                        <tbody>
                            <tr>
                                <th>Name :</th>
                                <td>
                                    <input type="text" name="name" id="name" value="{{$book->name}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Author :</th>
                                <td>
                                    <input type="text" name="author" id="author" value="{{$book->author}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Edition :</th>
                                <td>
                                    <input type="text" name="edition" id="edition" value="{{$book->edition}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Year :</th>
                                <td>
                                    <input type="text" name="year" id="year" value="{{$book->year}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Publisher :</th>
                                <td>
                                    <input type="text" name="publisher" id="publisher" value="{{$book->publisher}}">
                                </td>
                            </tr>
                            <tr>
                                <th>Quantity :</th>
                                <td>
                                    <input type="number"   name="qty" id="qty" value="{{$book->quantity}}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <button type="submit" class="button primary">Update</button>
                </form>
            {{-- </div> --}}
        </div>
    </div>
</section>

@endsection