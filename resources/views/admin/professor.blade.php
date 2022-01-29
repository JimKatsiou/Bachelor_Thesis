@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 aling="center">Προσθήκη Καθηγητή</h3>
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

            <form method="POST" action="{{ url('/admin/add_professor') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <b>Όνομα</b>
                    <input type="text" name="name" class="form-control" placeholder="Όνομα Καθηγητή" value="{{ old('name') }}" />
                </div>
                <div class="form-group">
                    <b>Επίθετο</b>
                    <input type="text" name="surname" class="form-control" placeholder="Επίθετο Καθηγητή" value="{{ old('surname') }}" />
                </div>
				<input type="hidden" name="role" class="form-control" value="1" />
                <div class="form-group">
                    <b>Email</b>
                    <input type="text" name="email" class="form-control" placeholder="Email Καθηγητή" value="{{ old('email') }}" />
                </div>
				<div class="form-group">
                    <b>Κωδικός Πρόσβασης</b>
                    <input type="password" name="password" class="form-control" placeholder="Κωδικός Πρόσβασης Καθηγητή" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-left">Ολοκλήρωση</button>
                    <a href="{{ url('/admin/users') }}" type="button" class="btn btn-secondary pull-right"> Ακύρωση</a>
                </div>
            </form>
        </div>
    </div>

@endsection
