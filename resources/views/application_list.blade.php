<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="content-wrapper">
    <section class="content">
	<div class="card">
	<div class="card-body">
            <br />
            <a href="{{ url('/home') }}" type="button" class="btn btn-secondary">Back</a>
            <br />
            <br />
			<div class="card-header">All Application
			</div>
            <br />
            <table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
            <tr>
                <th>Name</th>
                <th>Lastname</th>
                <th>AM</th>
                <th>Mail</th>
                <th>Etos</th>
                <th>Eksamino</th>
                <th>University</th>
                <th>Details</th>
            </tr>
			</thead>
			<tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->LastName}}</td>
                    <td>{{$row->AM}}</td>
                    <td>{{$row->Mail}}</td>
                    <td>{{$row->Etos}}</td>
                    <td>{{$row->Eksamino}}</td>
                    <td>{{$row->universities}}</td>
                    <td><a href="{{ url('/lesson/details') }}/{{ $row->id }}" class="btn btn-info"> More details </a></td>
                </tr>
            @endforeach
			</tbody>
            </table>
			</div>
			</div>
        </section>
    </div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
</body>
</html>