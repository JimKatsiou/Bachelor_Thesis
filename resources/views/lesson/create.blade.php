@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 aling="center"> Προσθήκη νέου μαθήματος</h3>
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

            <form method="POST" action="{{ url('add_lesson') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <b>Όνομα Μαθήματος</b>
                    <input type="text" name="name" class="form-control" placeholder="Συμπλήρωσε το όνομα" />
                </div>
                <div class="form-group">
                    <b>Μονάδες ECTS</b>
                    <input type="number" name="ects" min="1" class="form-control" placeholder="Συμπλήρωσε τις ECTS μονάδες" />
                </div>
                <div class="form-group">
                    <b>Link</b>
                    <input type="url" name="link" class="form-control" placeholder="Συμπλήρωσε το link" />
                </div>
                <div class="form-group">
                    <b>Εξάμηνο (Χειμερινό / Εαρινό)</b>
                    <input type="text" name="semester" class="form-control" placeholder="Συμπλήρωσε το Εξάμηνο" />
                </div>
                <div class="form-group">
                    <b>Πανεπιστήμιο</b>
                    <input type="text" name="university" class="form-control" placeholder="Συμπλήρωσε το πανεπιστήμιο" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ολοκλήρωση</button>
                    <a href="{{ url('/lesson/index') }}" type="button" class="btn btn-secondary pull-right"> Ακύρωση</a>
                </div>
            </form>
        </div>
    </div>

@endsection
