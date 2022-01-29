@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 aling="center">Τροποποίηση Μαθήματος</h3>
            <hr>

            <!--ALERT-->
            @if(count($errors) > 0)
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

            <form method="POST" action="{{ url('/lesson/update_lesson/'.$lesson->id) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <b>Όνομα Μαθήματος</b>
                    <input type="text" name="name" class="form-control" placeholder="Enter Lesson name" value="{{ $lesson->name }}" />
                </div>
                <div class="form-group">
                    <b>ECTS</b>
                    <input type="number" name="ects" min="1" class="form-control" placeholder="Enter  ects" value="{{ $lesson->ects }}" />
                </div>
                <div class="form-group">
                    <b>Link</b>
                    <input type="url" name="link" class="form-control" placeholder="Enter link" value="{{ $lesson->link }}" />
                </div>
                <div class="form-group">
                    <b>Εξάμηνο</b>
                    <input type="text" name="semester" class="form-control" placeholder="Συμπλήρωσε το Εξάμηνο" value="{{ $lesson->semester }}" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ολοκλήρωση</button>
                    <a href="{{ url('/lesson/index') }}" type="button" class="btn btn-secondary pull-right"> Ακύρωση</a>
                </div>
            </form>
        </div>
    </div>

@endsection
