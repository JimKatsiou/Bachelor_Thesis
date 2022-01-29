@extends('layouts.parti')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    h2,h4
    {
        text-align: center;
    }
</style>

@section('content')

    <a href="{{ url('/admin/pages/participationslist') }}" type="button" class="btn btn-secondary">Πίσω στην λίστα</a>
    <br><br>
    @if(session()->has('message'))
                  <div class="alert alert-success">
                    {{ session()->get('message') }}
                  </div>
                @endif
    <hr>
    <h4 align="center">ΑΙΤΗΣΗ ΑΝΤΙΣΤΟΙΧΙΣΗΣ ΜΑΘΗΜΑΤΟΣ ΓΙΑ ΦΟΙΤΗΤΕΣ ΠΟΥ ΘΑ ΜΕΤΑΚΙΝΗΘΟΥΝ ΜΕΣΩ ERASMUS + ΓΙΑ ΣΠΟΥΔΕΣ </h4>

    <div class="container">
        <hr>
        <h4 style="float: left;">Τρέχουσα Κατάσταση (Admin) :
        @if($app_data->app_status == 'Decline')
        <button class="btn btn-danger"><i class="fa fa-close"></i> Απορρίφθηκε</button>
        @elseif($app_data->app_status == 'Approved')
        <button class="btn btn-success"><i class="fa fa-check"></i> Εγκρίθηκε</button>
        @else
        <button class="btn btn-primary">Εκκρεμεί</button>
        @endif
        </h4>
		<br><br><br>
		<h4 style="float: left;">Τρέχουσα Κατάσταση (Καθηγητής) :
        @if($app_data->app_prof_status == 'Decline')
        <button class="btn btn-danger"><i class="fa fa-close"></i> Απορρίφθηκε</button>
        @elseif($app_data->app_prof_status == 'Approved')
        <button class="btn btn-success"><i class="fa fa-check"></i> Εγκρίθηκε</button>
        @else
        <button class="btn btn-primary">Εκκρεμεί</button>
        @endif
        </h4>
        <br><br>
        <hr><br>
        <table class="table" cellpadding="3" cellspacing="0" id="wp1075222table1075220">

        <tbody>
            <tr valign="top">
                <th scope="col">
                    <div class="pCellHeading">
                        <a name="wp1075226"> </a> 1. Στοιχεία μετακινούμενου φοιτητή
                    </div>
                </th>
            </tr>
            <tr valign="top">
                <td class="table" scope="row">
                    <div class="pCellBody">
                        <a name="wp1075230"> </a> Επίθετο:
                         {{ $app_data->user_LastName }}
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <td class="table" scope="row">
                    <div class="pCellBody"><a name="wp1075234"> </a> Όνομα:
                    {{ $app_data->user_name }}
                    </div>
                </td>
            </tr>
                <tr valign="top">
                    <td class="table" scope="row">
                        <div class="pCellBody">
                            <a name="wp1075571"> </a> ΑΜ: {{ $app_data->user_AM }}
                        </div>
                    </td>
                </tr>
                <tr valign="top">
                    <td class="table" scope="row">
                        <div class="pCellBody">
                            <a name="wp1075230"> </a> Email: {{ $app_data->user_Mail }}
                        </div>
                    </td>
                </tr>
        </tbody>
        </table>

        <br><br>

        <table class="table" cellpadding="3" cellspacing="0" id="wp1075222table1075220">

        <tbody>
            <tr valign="top">
                <th scope="col">
                    <div class="pCellHeading">
                        <a name="wp1075226"> </a> 2. Στοιχεία μετακίνησης
                    </div>
                </th>
            </tr>
            <tr valign="top">
                <td class="table" scope="row">
                    <div class="pCellBody">
                        <a name="wp1075230"> </a> Φορέας υποδοχής (πλήρες όνομα) : {{ $app_data->universities }}
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <td class="table" scope="row">
                    <div class="pCellBody">
                        <a name="wp1075234"> </a> Ακ. εξάμηνο (εαρινό/χειμερινό) : {{ $app_data->Eksamino }}
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <td class="table" scope="row">
                    <div class="pCellBody">
                        <a name="wp1075571"> </a> Ακ. έτος : {{ $app_data->Etos }}
                    </div>
                </td>
        </tbody>
        </table>

        <br><br>

        <table class="table" cellpadding="3" cellspacing="0" id="wp1075222table1075220">

            <tbody>
            <tr valign="top">
                <th scope="col">
                    <div class="pCellHeading">
                        <a name="wp1075226"> </a> 3. Στοιχεία μαθημάτων που αντιστοιχίζονται
                    </div>
                </th>
				@admin
                <th>Admin</th>
				@endadmin
                @if(Auth::user()->role == 1)
				<th>Professor</th>
                @endif
            </tr>
            <tr valign="top">
                <td class="table" scope="row">
                    <div class="pCellBody">
                        <b>Μάθημα :</b> {{ $app_data->uop_course }} <br/>
                        <b>ECTS :</b> {{ $app_data->uop_ects }} <br/>
                        <b>Link Μαθήματος :</b> {{ $app_data->uop_links }} <br/>
                        <b>Καθηγητής :</b> {{ $app_data->uop_professor }}
                    </div>
                </td>
                <form action="{{ url('/participation/update_app_status/'.$app_data->id) }}">
				    @admin
                    <td class="form-group">
                        <input type="radio" name="app_status" value="Approved" {{ ($app_data->app_status=="Approved")? "checked" : "" }}><p style="color: green;">ΝΑΙ</p>
                        <hr>
                        <input type="radio" name="app_status" value="Decline" {{ ($app_data->app_status=="Decline")? "checked" : "" }}><p style="color: red;">ΟΧΙ
                            <input type="text" name="app_comment">
                    </td>
				    @endadmin
                    @if(Auth::user()->role == 1)
                        <td class="form-group">
                            <input type="radio" name="app_prof_status" value="Approved" {{ ($app_data->app_prof_status=="Approved")? "checked" : "" }}><p style="color: green;">ΝΑΙ</p>
                            <hr>
                            <input type="radio" name="app_prof_status" value="Decline" {{ ($app_data->app_prof_status=="Decline")? "checked" : "" }}><p style="color: red;">ΟΧΙ</p>
                            <input type="text" name="app_comment">
                        </td>
                    @endif
                    <tr valign="top">
                    <td class="table" scope="row">
                        <div class="pCellBody">
                            <a name="wp1075230"> </a>
                            <b>Μάθημα :</b> {{ $app_data->allo_lesson }} <br/>
                            <b>ECTS :</b> {{ $app_data->allo_ects }} <br/>
                            <b>Link Μαθήματος :</b> {{ $app_data->allo_links }} <br/>
                            <b>Καθηγητής :</b> {{ $app_data->allo_professor }}
                        </div>
                    </td>
                    <td class="">
                        <input type="submit" class="btn btn-success btn-xs" value="Submit">
                    </td>
                    </tr>
                </form>
            </tbody>
        </table>

    </div>

@endsection
