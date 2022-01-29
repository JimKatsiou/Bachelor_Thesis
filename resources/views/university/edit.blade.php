@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/university/index') }}" type="button" class="btn btn-secondary">Πίσω</a>
            <br />
            <br />
            <h3 class="pull-center"> Τροποποίηση Πανεπιστημίου </h3>
            <br />

            @if(count($errors) > 0 )
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif

            <form method="post" action="{{ url('/university/university_update/'.$university->id) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <b>Όνομα Πανεπηστιμίου</b>
                    <input type="text" name="name" class="form-control" value="{{$university->name}}" placeholder="Enter University_Name">
                </div>

                <div class="form-group">
                    <b>Χώρα</b>
                    <input type="text" name="country" class="form-control" value="{{$university->country}}" placeholder="Enter country">
                </div>

                <div class="form-group">
                    <b>Κωδικός</b>
                    <input type="text" name="code" class="form-control" value="{{$university->code}}" placeholder="Enter code">
                </div>

                <div class="form-group">
                    <b>Ιστοσελίδα</b>
                    <input type="text" name="web_site" class="form-control" value="{{$university->web_site}}" placeholder="Enter web_Site">
                </div>

                <div class="form-group">
                    <b>Επιθυμητά Skills</b>
                    <input type="text" name="recommendedSkills" class="form-control" value="{{$university->recommendedSkills}}" placeholder="Enter recommendedSkills">
                </div>



                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ολοκλήρωση</button>
                        <a href="{{ url('/university/index') }}" type="button" class="btn btn-secondary pull-right"> Ακύρωση</a>
                </div>

            </form>
        </div>
    </div>

@endsection
