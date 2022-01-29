@extends('layouts.app')

@section('content')
<h1>{{$title}}

    @admin
    <button class="btn btn-secondary fa-pull-right" href='admin/pages/edit' role="button" >Edit</button>
    @endadmin
{{--        @hasrole('admin')--}}
{{--            <a class="btn btn-secondary pull-right" href='admin/pages/edit' role="button" >Edit</button></a>--}}
{{--        @endhasrole--}}
        </h1>
    @if(count($services) > 0 )
        <ul class="list-group">
            @foreach($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection
