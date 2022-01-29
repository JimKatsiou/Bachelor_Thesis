@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 aling="center">Edit User: {{ $data->name }} {{ $data->surname }}</h3>
            <br />

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

            <form method="POST" action="{{ url('/admin/update_user/'.$data->id) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <b>Όνομα</b>
                    <input type="text" name="name" class="form-control" placeholder="Enter Lesson name" value="{{ $data->name }}" />
                </div>
                <div class="form-group">
                    <b>Επίθετο</b>
                    <input type="text" name="surname" class="form-control" placeholder="Enter surname" value="{{ $data->surname }}" />
                </div>
                <div class="form-group">
                    <b>Ρόλος</b><br>
					<input type="radio" name="role" value="2" {{ ($data->role=="2")? "checked" : "" }}>user<br>
					<input type="radio" name="role" value="0" {{ ($data->role=="0")? "checked" : "" }}>admin<br>
					<input type="radio" name="role" value="1" {{ ($data->role=="1")? "checked" : "" }}>professor

                </div>
                <div class="form-group">
                    <b>Email</b>
                    <input type="text" name="email" class="form-control" placeholder="Enter email" value="{{ $data->email }}" />
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ολοκλήρωση</button>
                        <a href="{{ url('/admin/users') }}" type="button" class="btn btn-secondary pull-right"> Ακύρωση</a>
                </div>
            </form>
        </div>
    </div>

@endsection
