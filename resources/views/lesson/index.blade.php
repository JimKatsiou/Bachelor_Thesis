@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{ url('/home') }}" type="button" class="btn btn-danger">Πίσω</a>
                @admin
                <a href="{{ action('LessonController@create')}}" class="btn btn-primary pull-left" style="float: right"> + Προσθήκη </a>
                @endadmin
                <br><br>
                <div class="card">
                    <div class="card-header" align="center"><b>Λίστα Μαθημάτων</b></div>

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
                        <thead class="thead-dark">
                        <tr align="center">
                            <th>Όνομα Μαθήματος</th>
                            <th scope="col">Μονάδες ECTS</th>
                            <th scope="col">Link</th>
                            <th scope="col">Εξάμηνο</th>
{{--                            <th> Καθηγητής</th>--}}
                            @admin
                            <th scope="col">Επεξεργασία</th>
                            @endadmin
                            <th scope="col">Κατάσταση Μαθήματος</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($lessons as $row)
                            <tr>
                                <td align="center">{{ $row->name }}</td>
                                <td align="center">{{$row->ects}}</td>
                                <td align="center">{{$row->link}}</td>
                                <td align="center">{{$row->semester}}</td>
{{--                                <td align="center">{{$teaches->user_id}}</td>--}}
                                @admin
                                <td align="center">
                                    <a href="{{ action('LessonController@edit_lesson' , $row->id) }}" class="btn btn-warning"> Επεξεργασία </a>
                                </td>
                                <td align="center">
                                    @if($row->display == 1)
                                    <a href="{{ url('/lesson/lesson_display/'.$row->id.'/0') }}" class="btn btn-danger" onclick="return confirm('Are you sure want to enable ?')">Enable</a>
                                    @elseif($row->display == 0)
                                    <a href="{{ url('/lesson/lesson_display/'.$row->id.'/1') }}" class="btn btn-success" onclick="return confirm('Are you sure want to disable ?')">Disable</a>
                                    @endif
                                </td>
                                @endadmin

                                @if(Auth::user()->role == 2 || Auth::user()->role == 1)
                                    @if($row->display == 0)
                                        <td class="badge-success" align="center">
                                            Διαθέσιμο
                                        </td>
                                    @elseif($row->display == 1)
                                        <td class="badge-danger" align="center">
                                            Μη Διαθέσιμο
                                        </td>
                                    @endif
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
            </div>
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
