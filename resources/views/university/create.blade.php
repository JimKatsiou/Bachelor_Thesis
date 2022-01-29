@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 aling="center"> Προσθήκη νέου Φορέα</h3>
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

            <form method="POST" action="{{ url('add_university') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <b>Όνομα Πανεπιστημίου</b>
                    <input type="text" name="name" class="form-control" placeholder="Όνομα Πανεπιστημίου" />
                </div>

                <div class="form-group">
                    <b>Χώρα</b>
                        <input type="text" name="country" class="form-control" placeholder="Χώρα" />
                </div>

                <div class="form-group">
                    <b>Κωδικός</b>
                    <input type="text" name="code" class="form-control" placeholder="Κωδικός" />
                </div>

                <div class="form-group">
                    <b>Ιστοσελίδα</b>
                        <input type="text" name="web_site" class="form-control" placeholder="Ιστοσελίδα" />
                </div>

                <div class="form-group">
                    <b>Επιθυμητά Skills</b>
                        <input type="text" name="recommendedSkills" class="form-control" placeholder="Επιθυμητά Skills" />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ολοκλήρωση</button>
                    <a href="{{ url('/university/index') }}" type="button" class="btn btn-secondary pull-right"> Ακύρωση</a>
                </div>
            </form>
        </div>
    </div>

@endsection
