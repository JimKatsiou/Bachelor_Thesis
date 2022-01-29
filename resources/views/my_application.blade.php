@extends('layouts.app')


@section('content')
    <div class="container">
<div class="row justify-content-center">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()->role == 0)
                <a href="{{ url('/lesson/application/list') }}" type="button" class="btn btn-secondary">Back</a>
            @else
                <a href="{{ url('/home') }}" type="button" class="btn btn-secondary">Πίσω</a>
            @endif
            <br>
            <br>
            <h3 class="pull-center"> Η Αίτηση μου </h3>

            <br/>
            <table class="table table-bordered">
                <tr align="center">
                    <th>Όνομα</th>
                    <th>Επίθετο</th>
                    <th>AM</th>
                    <th>Mail</th>
                    <th>Έτος</th>
                    <th>Εξάμηνο</th>
                    <th>Φορέας υποδοχής</th>
                </tr>

                @foreach ($data as $row)
                    <tr align="center">
                        <td>{{$row->name}}</td>
                        <td>{{$row->LastName}}</td>
                        <td>{{$row->AM}}</td>
                        <td>{{$row->Mail}}</td>
                        <td>{{$row->Etos}}</td>
                        <td>{{$row->Eksamino}}</td>
                        <td>{{$row->universities}}</td>
                    </tr>
                @endforeach
            </table>
            <table class="table table-bordered">
                <tr align="center">
                    <th>Μάθημα</th>
                    <th>ECTS Μονάδες</th>
                    <th>Link Μαθήματος</th>
                    <th>Επίθετο Καθηγητή</th>
                    <th>Μαθημα (Φορέα)</th>
                    <th>ECTS Μονάδες (Φορέα)</th>
                    <th>Link Μαθήματος (Φορέα)</th>
                    <th>Επίθετο Καθηγητή (Φορέα)</th>
                    <th>Κατάσταση Αίτησης</th>
                </tr>

                @foreach ($app_data as $ad)
                    <tr align="center">
                        <td>{{$ad->uop_course}}</td>
                        <td>{{$ad->uop_ects}}</td>
                        <td>{{$ad->uop_links}}</td>
                        <td>{{$ad->uop_professor}}</td>
                        <td>{{$ad->allo_lesson}}</td>
                        <td>{{$ad->allo_ects}}</td>
                        <td>{{$ad->allo_links}}</td>
                        <td>{{$ad->allo_professor}}</td>
                        <td>
                            @if($ad->app_status == 'Decline')
                                <i class="fa fa-close"></i>Απορρίφθηκε
                            @elseif($ad->app_status == 'Approved')
                                <i class="fa fa-check"></i>Εγκρίθηκε/
                            @else
                                <i class="fa fa-circle-o-notch"></i>Εκρεμεί /
                            @endif
                            @if($ad->app_status == 'Approved')
                                @if($ad->app_prof_status == 'Decline')
                                    <i class="fa fa-close"></i>Απορρίφθηκε
                                @elseif($ad->app_prof_status == 'Approved')
                                    <i class="fa fa-check"></i>Εγκρίθηκε
                                @else
                                    <i class="fa fa-circle-o-notch"></i>Εκρεμεί
                                @endif
                            @elseif($ad->app_status == '')
                                <i class="fa fa-circle-o-notch"></i>Εκρεμεί
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
@endsection

{{--@extends('layouts.master')--}}


{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <br />--}}
{{--            <a href="{{ url('/home') }}" type="button" class="btn btn-secondary">Πίσω</a>--}}
{{--            <br />--}}
{{--            <br />--}}
{{--            <h3 class="pull-center"> Η Αίτηση μου </h3>--}}

{{--            <br />--}}
{{--            <table class="table table-bordered">--}}
{{--            <tr>--}}
{{--                <th>Όνομα</th>--}}
{{--                <th>Επίετο</th>--}}
{{--                <th>ΑΜ</th>--}}
{{--                <th>Mail</th>--}}
{{--                <th>Αίτος</th>--}}
{{--                <th>Εξάμηνο</th>--}}
{{--                <th>Πανεπιστήμιο</th>--}}
{{--                <th>Λεπτομέριες</th>--}}
{{--				@if(Auth::user()->role == 2)--}}
{{--				<th>Admin Status</th>--}}
{{--				<th>Professor Status</th>--}}
{{--				@endif--}}
{{--            </tr>--}}

{{--            @foreach ($data as $row)--}}
{{--                <tr>--}}
{{--                    <td>{{$row->name}}</td>--}}
{{--                    <td>{{$row->LastName}}</td>--}}
{{--                    <td>{{$row->AM}}</td>--}}
{{--                    <td>{{$row->Mail}}</td>--}}
{{--                    <td>{{$row->Etos}}</td>--}}
{{--                    <td>{{$row->Eksamino}}</td>--}}
{{--                    <td>{{$row->universities}}</td>--}}
{{--                    <td><a href="{{ url('/lesson/details') }}/{{ $row->id }}" class="btn btn-info"> Παραπάνω Λεπτομέριες </a></td>--}}
{{--					@if(Auth::user()->role == 2)--}}
{{--					<td>--}}
{{--					@if($row->app_status == 'Decline')--}}
{{--					<button class="btn btn-danger"><i class="fa fa-close"></i> Απορρίφθηκε </button>--}}
{{--					@elseif($row->app_status == 'Approved')--}}
{{--					<button class="btn btn-success"><i class="fa fa-check"></i> Έχει εγκριθεί</button>--}}
{{--					@else--}}
{{--					<button class="btn btn-primary">Εκκρεμεί</button>--}}
{{--					@endif--}}
{{--					</td>--}}
{{--					<td>--}}
{{--					@if($row->pro_app_status == 'Decline')--}}
{{--					<button class="btn btn-danger"><i class="fa fa-close"></i>Απορρίφθηκε </button>--}}
{{--					@elseif($row->pro_app_status == 'Approved')--}}
{{--					<button class="btn btn-success"><i class="fa fa-check"></i> Έχει εγκριθεί</button>--}}
{{--					@else--}}
{{--					<button class="btn btn-primary">Εκκρεμεί</button>--}}
{{--					@endif--}}

{{--					@if($row->app_status == 'Approved')--}}
{{--					<a href="https://view.officeapps.live.com/op/view.aspx?src={{ asset('learning.doc') }}" target="_blank" class="btn btn-secondary">Download--}}
{{--					</a>--}}
{{--					@endif--}}
{{--					</td>--}}
{{--					@endif--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}
