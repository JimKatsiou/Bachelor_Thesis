@extends('layouts.appindexpage')

@section('content')
    <h1>{{$title}}
{{--        @admin--}}
{{--        <a class="btn btn-secondary fa-pull-right" href="{{ url('experiences_details') }}" role="button" >Edit</a>--}}
{{--        @endadmin--}}
    </h1>
    <hr>

    <div>
        <!-- <a href="{ route('downloadfile', $file->id) }}">Εμπειρίες Φοιτητών</a> -->
        @foreach ($data as $dt)

{{--            <a href="/download">{!! $dt->content !!}</a>--}}

            <a href="{{ asset('empeiries_foititon.pdf') }}" target="_blank">ΕΜΠΕΙΡΙΕΣ ΦΟΙΤΗΤΩΝ</a>

        @endforeach
    </div>


@endsection
