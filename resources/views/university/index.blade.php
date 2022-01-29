@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

            @admin
                <a href="{{ url('/home') }}" type="button" class="btn btn-secondary">Πίσω</a>
                <a href="{{ action('UniversityController@create')}}" class="btn btn-primary pull-right" style="float: right"> + Προσθήκη </a>
            @endadmin

            <br/><br/>
            <div class="card">
                <div class="card-header" align="center"><b>Λίστα Συνεργαζόμενων Πανεπιστημίων</b></div>

                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                        <table class="table table-bordered table-hover">
                            <thead class="thead">
                            <tr align="center">
                                <th scope="col">Όνομα Πανεπιστημίου</th>
                                <th scope="col">Χώρα</th>
                                <th scope="col">Κωδικός</th>
                                <th scope="col">Ιστοσελίδα</th>
                                <th scope="col">Επιθυμητά Skills</th>
                                @admin
                                <th scope="col">Επεξεργασία</th>
                                <th scope="col">Κατάσταση Συμφωνίας</th>
                                @endadmin
                            </tr>
                            </thead>
                        @foreach ($universities as $row)
                        <tr align="center">
                            <td align="center">{{$row->name}}</td>
                            <td align="center">{{$row->country}}</td>
                            <td align="center">{{$row->code}}</td>
                            <td align="center">{{$row->web_site}}</td>
                            <td align="center">{{$row->recommendedSkills}}</td>
                            @admin
                            <td align="center">
                                <a href="{{ action('UniversityController@edit' , $row->id) }}" class="btn btn-warning"> Επεξεργασία </a>
                            </td>
                            <td align="center">
                                @if($row->display == 1)
                                    <a href="{{ url('/university/university_display/'.$row->id.'/0') }}" class="btn btn-danger" onclick="return confirm('Are you sure want to enable ?')">Enable</a>
                                @elseif($row->display == 0)
                                    <a href="{{ url('/university/university_display/'.$row->id.'/1') }}" class="btn btn-success" onclick="return confirm('Are you sure want to disable ?')">Disable</a>
                                @endif
                            </td>
                            @endadmin


{{--                            @if(Auth::user()->role == 2 || Auth::user()->role == 1)--}}
{{--                                @if($row->display == 0)--}}
{{--                                    <td class="badge-success" align="center">--}}
{{--                                        Enable--}}
{{--                                    </td>--}}
{{--                                @elseif($row->display == 1)--}}
{{--                                    <td class="badge-danger" align="center">--}}
{{--                                        Disable--}}
{{--                                    </td>--}}
{{--                                @endif--}}
{{--                            @endif--}}
                        </tr>
                        @endforeach
                    </table>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.delete_form').on('submit' , function(){
                if(confirm("Are you sure you want to delete it?"))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            });
        });
    </script>
@endsection
