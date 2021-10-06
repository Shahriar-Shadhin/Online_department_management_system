@extends('layouts.main')

@section('title', 'Student Dashboard')
@section('header')
@include('partials.header')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
@endsection

@section('banner_title', 'Routine')


@section('content')
<section style="width: auto">
  <div class="content">
   <table id="tblCustomers">
       <thead>
           <tr>
               {{-- <th>Course Name</th> --}}
               <th>Course Code</th>
               <th>Room Number</th>
               <th>Class Day</th>
               <th>Class Time</th>
           </tr>
       </thead>
       <tbody>
        @if (count($data) != 0)
           @foreach ($data as $item)
                @php
                    $time = explode(" ",$item->preferred_time);
                    $day = explode(" ",$item->preferred_day);
                    $room = explode(" ",$item->class_room);
                @endphp
               <tr>
                    <td>{{$item->course_code}}</td>
                    <td>
                        @foreach ($room as $item)
                            <p style="margin: 0">{{$item}}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($day as $item)
                            <p style="margin: 0">{{$item}}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($time as $item)
                            <p style="margin: 0">{{$item}}</p>
                        @endforeach
                    </td>
               </tr>
           @endforeach
        @endif
       </tbody>
   </table>
  <input type="button" class="button primary" id="btnExport" value="Download PDF" />

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
                pdfMake.createPdf(docDefinition).download("customer-details.pdf");
            }
        });
    });
</script>

@endsection