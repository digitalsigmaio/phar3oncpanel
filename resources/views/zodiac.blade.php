@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-ms-6 content-insert pull-right">
            <div class="row">
                <ul class="nav navbar-nav">
                    <li><a href="zodiacNew" class="btn btn-primary">New Zodiac</a></li>
                </ul>
            </div>
        </div>
		<div class="col-md-6 content-insert">
			@if(session()->get('message'))
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>{{ session()->get('message') }}</strong>.
				</div>		
			@endif
		</div>
    </div>
	
	
	
    <div class="artist-details" id="artistDetails">
        @if(count($zodiacs) > 0)
        <hr>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Day</th>
				<th>Month</th>
				<th>Zodiac Number</th>
                <th>Edit</th>
                <th>x</th>
            </tr>
            </thead>
            <tbody>
            @foreach($zodiacs as $zodiac)
                <tr>
                    <td>{{ $zodiac->id }}</td>
                    <td>{{ $zodiac->title }}</td>
                    <td>{{ $zodiac->day }}</td>
					<td>{{ $zodiac->month }}</td>
					<td>{{ $zodiac->numberborg }}</td>
                    <td><a href="zodiacEdit/{{ $zodiac->id }}" class="btn btn-default">Edit</a></td>
                    <td><a href="zodiacDelete/{{ $zodiac->id }}" class="btn btn-danger deleteItem">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
		{{ $zodiacs->links() }}
        @else
            <h4>There is no Zodiac in the record yet</h4>
        @endif
    </div>
@endsection