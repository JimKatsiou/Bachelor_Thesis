@extends('layouts.appindexpage')

@section('content')
    <h1>
        {{$title}}
        @admin
        <a href="{{ action('AnnouncementsController@create')}}" class="btn btn-primary pull-right" style="float: right"> + Προσθήκη </a>
        @endadmin
    </h1>

    <hr style="border: 1px solid black">
    @if(count($announcements) > 0)
        @foreach($announcements as $announcement)
            <div class="well">
                <div class="row">
{{--                    <div class="col-md-4 col-sm-4">--}}
{{--                        <img style="width:100%" src="/storage/cover_images/{{$announcement->cover_image}}">--}}
{{--                    </div>--}}
                    <div class="col-md-12 col-sm-12">
                        <h4>
{{--                            <a href="/announcements/{{$announcement->id}}">{{$announcement->title}}</a>--}}
                            {{$announcement->title}}
                            @admin
                            <a href="{{ action('AnnouncementsController@edit', $announcement->id)}}" class="btn btn-dark pull-right" style="float: right"> Επεξεργασία </a>
{{--                            <a href="/announcements/edit/{{$announcement->id}}" class="btn btn-dark pull-right" style="float: right">Επεξεργασία</a>--}}
                            {!!Form::open(['action' => ['AnnouncementsController@destroy' , $announcement->id] , 'method' => 'POST', 'class' => 'pull-rightpull-right', 'style' =>"float:right" ])!!}
                            {{Form::hidden('_method' , 'DELETE')}}
                            {{Form::submit('Διαγραφή' , ['class' => 'btn btn-danger pull-right', 'style' =>"float:right"])}}
                            {!!Form::close()!!}
                            @endadmin
                        </h4>
                        <hr>
                        <div>
                            <p>
                            {!!$announcement->body!!}   <!-- Na ginei parsed h html -->
                            </p>
                        </div>
                        <small> {{$announcement->created_at}}</small>
                    </div>

                </div>
            </div>
            <hr style="border: 1px solid black">
            <br/>
        @endforeach
    @else
        <p>Δεν υπάρχουν ανακοινώσεις</p>
    @endif
@endsection
