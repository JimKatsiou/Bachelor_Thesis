@extends('layouts.appindexpage')

@section('content')
    <a href="/announcements" class="btn btn-default" role="button">Go back</a>
    <h1>{{$announcements->title}}</h1>
    <img style="width:100%" src="public/storage/cover_images/{{$announcements->cover_image}}">
    <br><br>
    <div>
    {!!$announcements->body!!}   <!-- Na ginei parsed h html -->
    </div>
    <hr>
    <small>Written on {{$announcements->created_at}}</small>
{{--    <small>Written on {{$announcements->created_at}} by {{$announcements->user->name}}</small>--}}
    <hr>
    @if(!Auth::guest()) <!-- an einai guest den mporei na dei ta koubia edit kai delete -->
{{--    @if(Auth::user()->id == $announcements->user_id) <!-- kai na mhn mporei na kanei edit allounou xrhsth -->--}}
    <a href="/announcements/{{$announcements->id}}/edit" class="btn bnt-default">Edit</a>

    {!!Form::open(['action' => ['AnnouncementsController@destroy' , $announcements->id] , 'method' => 'POST', 'class' => 'pull-right' ])!!}
    {{Form::hidden('_method' , 'DELETE')}}
    {{Form::submit('Delete' , ['class' => 'btn bnt-danger'])}}
    {!!Form::close()!!}
    @endif
{{--    @endif--}}
@endsection
