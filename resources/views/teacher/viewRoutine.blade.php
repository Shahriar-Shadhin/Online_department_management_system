@extends('layouts.main')

@section('title', 'Teacher Dashboard')
@section('header')
@include('partials.header')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

@endsection


@section('banner_title')
{{'Routine'}}
@endsection

@section('content')
<section style="width: auto; justify-content: center ">
    <div class="content" >
    
            {{-- <div class="details" style="overflow-y: auto; max-height: 400px; max-width: 600px;"> --}}
                <table id="tblCustomers" class="table table">
                    <thead>
                        <tr>
                          <th>Semester</th>
                          <th>Saturday</th>
                          <th>Sunday</th>
                          <th>Monday</th>
                          <th>Tuesday</th>
                          <th>Wednesday</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($RoutineDatas) != 0)
                        <tr>
                            <td>1-1</td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "1st" && $routine->days =='Saturday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "1st" && $routine->days =='Sunday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "1st" && $routine->days =='Monday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "1st" && $routine->days =='Tuesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "1st" && $routine->days =='Wednesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>1-2</td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "2nd" && $routine->days =='Saturday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "2nd" && $routine->days =='Sunday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "2nd" && $routine->days =='Monday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "2nd" && $routine->days =='Tuesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "2nd" && $routine->days =='Wednesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>2-1</td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "3rd" && $routine->days =='Saturday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "3rd" && $routine->days =='Sunday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "3rd" && $routine->days =='Monday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "3rd" && $routine->days =='Tuesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "3rd" && $routine->days =='Wednesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>2-2</td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "4th" && $routine->days =='Saturday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                    
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "4th" && $routine->days =='Sunday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "4th" && $routine->days =='Monday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "4th" && $routine->days =='Tuesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "4th" && $routine->days =='Wednesday')
                                        {{-- <p>{{$routine->course_code}}</p> --}}
                                        <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                    
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>3-1</td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "5th" && $routine->days =='Saturday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "5th" && $routine->days =='Sunday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "5th" && $routine->days =='Monday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "5th" && $routine->days =='Tuesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "5th" && $routine->days =='Wednesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>3-2</td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "6th" && $routine->days =='Saturday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "6th" && $routine->days =='Sunday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "6th" && $routine->days =='Monday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "6th" && $routine->days =='Tuesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "6th" && $routine->days =='Wednesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>4-1</td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "7th" && $routine->days =='Saturday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "7th" && $routine->days =='Sunday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "7th" && $routine->days =='Monday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "7th" && $routine->days =='Tuesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "7th" && $routine->days =='Wednesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>4-2</td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "8th" && $routine->days =='Saturday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "8th" && $routine->days =='Sunday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "8th" && $routine->days =='Monday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "8th" && $routine->days =='Tuesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($RoutineDatas as $routine)
                                    @if ($routine->course->course_semester == "8th" && $routine->days =='Wednesday')
                                    <p style="padding: 0; margin: 0">{{$routine->course_code . '-' . $routine->times . '-'. $routine->rooms}}</p>
                                        
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @else
                        <td colspan="6">No Routine Found</>
                        @endif
                    </tbody>
                    <tfoot></tfoot>
                </table>
            {{-- </div> --}}
        {{-- </div> --}}
        <br>
        <input type="button" class="button primary text-center" id="btnExport" value="Download PDF" />
    </div>

</section>

<script type="text/javascript">
    $("body").on("click", "#btnExport", function () {
        html2canvas($('#tblCustomers')[0], {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("class-routine.pdf");
            }
        });
    });
</script>

@endsection