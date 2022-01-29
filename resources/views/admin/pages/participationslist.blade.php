<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    </head>
<body>
    <div class="content-wrapper">
        <section class="content">
	    <div class="card">
        <div class="card-body">
            <br/>
        <a href="{{ url('/home') }}" type="button" class="btn btn-danger">Πίσω-Dashboard</a>
		<br />
		<br />
        <div class="card-header" align="center"> <b>ΛΙΣΤΑ ΑΙΤΗΣΕΩΝ ΑΝΤΙΣΤΟΙΧΙΣΗΣ ΜΑΘΗΜΑΤΩΝ</b></div>
		<br />
            <table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
			<tr align="center">
                <th>Όνοματεπώνυμο</th>
                <th>Μαθήμα (UOP)</th>
                <th>Μαθήμα (ΠΑΝΕΠΙΣΤΗΜΙΟΥ ΥΠΟΔΟΧΉΣ)</th>
                <th>Ακ. Έτος</th>
                <th>Εξάμηνο</th>
                <th>  </th>
                @admin
                <th>Admin Status</th>
                <th>Professor Status</th>
                @endadmin
                @if(Auth::user()->role == 1)
                    <th> Prof. Status </th>
                @endif
                <th> Παρατήρηση </th>
            </tr>
			</thead>
			<tbody>

            @admin
            @foreach($app_data as $dt)
                    <tr align="center">
                        <td> {{$dt->user_name }} {{ $dt->user_LastName }} </td>
                        <td> {{$dt->uop_course}} </td>
                        <td> {{$dt->allo_lesson}} </td>
                        <td> {{$dt->Etos}} </td>
                        <td> {{$dt->Eksamino}} </td>
                        <td> <a class="btn btn-success btn" href="{{ url('/admin/pages/participations') }}/{{$dt->id }}" role="button"> Αναλυτικά </a> </td>
                        @admin
                        <td>
                            @if($dt->app_status == 'Decline')
                                <i class="fa fa-close"></i> Απορρίφθηκε
                            @elseif($dt->app_status == 'Approved')
                                <i class="fa fa-check"></i> Εγκρίθηκε
                            @else
                                <i class="fa fa-circle-o-notch"></i> Εκρεμεί
                            @endif
                        </td>
                        <td>
                            @if($dt->app_prof_status == 'Decline')
                                <i class="fa fa-close"></i> Απορρίφθηκε
                            @elseif($dt->app_prof_status == 'Approved')
                                <i class="fa fa-check"></i> Εγκρίθηκε
                            @else
                                <i class="fa fa-circle-o-notch"></i> Εκρεμεί
                            @endif
                        </td>
                        @endadmin
                        @if(Auth::user()->role == 1)
                            <td>
                                @if($dt->app_prof_status == 'Decline')
                                    <i class="fa fa-close"></i> Απορρίφθηκε
                                @elseif($dt->app_prof_status == 'Approved')
                                    <i class="fa fa-check"></i> Εγκρίθηκε
                                @else
                                    <i class="fa fa-circle-o-notch"></i> Εκρεμεί
                                @endif
                            </td>
                        @endif
                        <td> {{$dt->app_comment}} </td>
                    </tr>
            @endforeach
            @endadmin

            @foreach($app_data as $dt)

                @if(Auth::user()->role == 1 && Auth::user()->surname == $dt->uop_professor)
                    @if($dt->app_status == 'Approved')
                        <tr align="center">
                            <td> {{$dt->user_name }} {{ $dt->user_LastName }} </td>
                            <td> {{$dt->uop_course}} </td>
                            <td> {{$dt->allo_lesson}} </td>
                            <td> {{$dt->Etos}} </td>
                            <td> {{$dt->Eksamino}} </td>
                            <td> <a class="btn btn-success btn" href="{{ url('/admin/pages/participations') }}/{{$dt->id }}" role="button"> Αναλυτικά </a> </td>
                            @if(Auth::user()->role == 1)
                                <td>
                                    @if($dt->app_prof_status == 'Decline')
                                        <i class="fa fa-close"></i> Απορρίφθηκε
                                    @elseif($dt->app_prof_status == 'Approved')
                                        <i class="fa fa-check"></i> Εγκρίθηκε
                                    @else
                                        <i class="fa fa-circle-o-notch"></i> Εκρεμεί
                                    @endif
                                </td>
                            @endif
                            <td> {{$dt->app_comment}} </td>
                        </tr>
                    @endif
                @endif
            @endforeach


{{--            @endforeach--}}


{{--            @foreach($data as $dt)--}}
{{--                <tr>--}}
{{--                <td>--}}
{{--                <a href="{{ url('/admin/pages/participations') }}/{{ $dt->id }}">--}}
{{--                {{ $dt->name }} {{ $dt->LastName }}--}}
{{--                </a>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                </td>--}}
{{--                <td>--}}


{{--                    <!--@if($dt->status == 1)--}}
{{--                    <button class="btn btn-info"><i class="fa fa-spinner fa-spin"></i> In Progress</button>--}}
{{--                    @elseif($dt->status == 2)--}}
{{--                    <button class="btn btn-secondary" ><i class="fa fa-hand-stop-o"></i> Holding</button>--}}
{{--                    @elseif($dt->status == 3)--}}
{{--                    <button class="btn btn-danger"><i class="fa fa-close"></i> Rejected</button>--}}
{{--                    @elseif($dt->status == 4)--}}
{{--                    <button class="btn btn-success"><i class="fa fa-check"></i> Accepted</button>--}}
{{--                    @elseif($dt->status == 5)--}}
{{--                    <button class="btn btn-primary"><i class="fa fa-check"></i> Executed</button>--}}
{{--                    @else--}}
{{--                    <button class="btn"> Pending</button>--}}
{{--                    @endif-->--}}
{{--                    </td>--}}

{{--                    </tr>--}}
{{--            @endforeach--}}
			</tbody>
            </table>
            <br/>
        </div>
        </div>
        </section>
    </div>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
</body>
</html>
