@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

		<a href="{{ url('/home') }}" type="button" class="btn btn-danger">Πίσω</a>
		<a href="{{ url('/admin/professor') }}" type="button" class="btn btn-primary" style="float:right;">+ Προσθήκη Καθηγητή</a>
		<br><br>
            <div class="card">
{{--                <a href="{{ url('/home') }}" class="btn btn-dark pull-left"> Dashboard </a>--}}
                <div class="card-header" align="center"><b>Διαχείριση Χρηστών</b></div>

                <div class="card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                    {{ session()->get('message') }}
                    </div>
                    @endif

                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr align="center">

                                <th scope="col">Όνομα</th>
                                <th scope="col">Επίθετο</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ρόλος</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Impersonate</th>
                                <th scope="col">Διαγραφή</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr align="center">
                                <td align="center"> {{$user->name}} </td>
                                <td align="center"> {{$user->surname}} </td>
                                <td align="center"> {{$user->email}} </td>
                                <td align="center"> {{$user->role}} </td>
{{--                                <th> {{implode(', ', $user->role()->get()->pluck('name')->toArray()) }}</th>--}}
                                <td align="center">
                                    <a href='edit_user/{{ $user->id }}' class="btn btn-primary btn-sm float-center">
                                    Edit
                                    </a>
                                </td>
								<td>
                                    <a href="{{ route('admin.impersonate', $user->id) }}" class="btn btn-success btn-sm float-center" target="_blank">
                                        Impersonate User
                                    </a>
                                </td>

                                <!--<th>
                                    <a href="{{ url('/admin/impersonate_user/'.$user->id.'/0') }}" class="float-left">
                                        <button class="btn btn-success btn-sm" type="button">Impseronate User</button>
                                    </a>
                                </th>-->
                                <td>
                                    <a href='admin_delete_user/{{ $user->id }}' class="btn btn-danger btn-sm float-center" onclick="return confirm('Είσαι σίγουρος οτι θέλεις να διαγράψεις;')">Διαγραφή</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    {{ $users->links() }}--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
