@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ Auth::user()->name}} {{ Auth::user()->surname}}<b> Dashboard</b>
                </div>

                <div class="card-body">
                    @if(session()->has('message'))
                      <div class="alert alert-success">
                        {{ session()->get('message') }}
                      </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if(Auth::user()->role == 2)
                            <a class="btn btn-secondary btn-lg" href="{{ url('/lesson/index') }}" role="button">Κατάλογος Μαθημάτων</a>
                            <hr>
                            <a class="btn btn-success btn-lg" href="{{ url('/participation/index') }}" role="button">Κάνε Αίτηση</a>
                            <hr>
{{--                            <a class="btn btn-primary btn-lg" href="{{ url('/user/my_application') }}" role="button">Η Αίτηση μου</a>--}}
                            <a class="btn btn-primary btn-lg" href="{{ url('/my_application') }}" role="button">Η Αίτηση μου</a>
{{--                            <br>--}}
{{--                            <hr>--}}
{{--                            <a class="btn btn-secondary btn-lg" href="{{ url('/learing') }}" role="button">Learning_Agreement</a>--}}
                        @endif

					@if(Auth::user()->role == 1)

                        <a class="btn btn-primary btn-lg" href="{{ url('/admin/pages/participationslist') }}" role="button">Όλες οι Αιτήσεις</a>
						<hr>
						<a class="btn btn-secondary btn-lg" href="{{ url('/lesson/index') }}" role="button">Κατάλογος Μαθημάτων</a>

					@endif

                    @admin
                        <a class="btn btn-primary btn-lg" href="{{ route('admin.users.index') }}" role="button">Διαχείριση Χρηστών</a>
                        <br/>
                        <hr>
                        <a class="btn btn-secondary btn-lg" href="{{ url('/lesson/index') }}" role="button">Διαχείριση Μαθημάτων</a>
						<br>
                        <hr>
						<a class="btn btn-secondary btn-lg" href="{{ url('/university/index') }}" role="button">Διαχείριση Διμερών Συμφωνιών</a>
                        <br>
                        <hr>
                        <a class="btn btn-secondary btn-lg" href="{{ url('/participation/index') }}" role="button">Φόρμα Αίτησης</a>
                        <br>
                        <hr>
                        <a class="btn btn-primary btn-lg" href="{{ url('/admin/pages/participationslist') }}" role="button">Όλες οι Αιτήσεις</a>
                    @endadmin

                        @impersonate()
                            <a class="nav-link" href="{{ route('admin.impersonate.destroy') }}">Stop Impersonating</a>
                        @endimpersonate
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
