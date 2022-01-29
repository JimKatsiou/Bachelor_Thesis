@extends('layouts.appindexpage')

@section('content')
    <h1>{{$title}}

        @admin
        <a class="btn btn-secondary fa-pull-right" href="{{ url('contact_details') }}" role="button" >Edit</a>
        @endadmin

    </h1>

    <hr>

    <div class="newsitem_text">
        @foreach ($data as $dt)
            <p>
                {!! $dt->content !!}
            </p>
        @endforeach
    </div>
@endsection
