@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
			@if(Auth::user()->role == 0)
			<a href="{{ url('/lesson/application/list') }}" type="button" class="btn btn-secondary">Back</a>
			@else
			<a href="{{ url('/user/my_application') }}" type="button" class="btn btn-secondary">Back</a>
			@endif
			<br>
            <br>
            <h3 class="pull-center"> Η Αίτηση μου </h3>

            <br />
            <table class="table table-bordered">
            <tr align="center">
                <th align="center">Όνομα</th>
                <th align="center">Επίθετο</th>
                <th align="center">AM</th>
                <th>Mail</th>
                <th>Etos</th>
                <th>Eksamino</th>
                <th>University</th>
            </tr>

            @foreach ($data as $row)
                <tr>
                    <td align="center">{{$row->name}}</td>
                    <td align="center">{{$row->LastName}}</td>
                    <td align="center">{{$row->AM}}</td>
                    <td align="center">{{$row->Mail}}</td>
                    <td align="center">{{$row->Etos}}</td>
                    <td align="center">{{$row->Eksamino}}</td>
                    <td align="center">{{$row->universities}}</td>
                </tr>
            @endforeach
            </table>
            <table class="table table-bordered">
            <tr align="center">
                <th align="center">Uop course</th>
                <th align="center">Uop ects</th>
                <th align="center">Uop links</th>
                <th align="center">Uop professor</th>
            </tr>

            @foreach ($app_data as $ad)
                <tr>
                    <td>{{$ad->uop_course}}</td>
                    <td>{{$ad->uop_ects}}</td>
                    <td>{{$ad->uop_links}}</td>
                    <td>{{$ad->uop_professor}}</td>
                </tr>
            @endforeach
            </table>
            <table class="table table-bordered">
            <tr>
                <th>Allo course</th>
                <th>Allo ects</th>
                <th>Allo links</th>
                <th>Allo professor</th>
            </tr>

            @foreach ($app_data as $a)
                <tr>
                    <td>{{$a->allo_lesson}}</td>
                    <td>{{$a->allo_ects}}</td>
                    <td>{{$a->allo_links}}</td>
                    <td>{{$a->allo_professor}}</td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>

@endsection
