@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="row">
            <h1>{{ $date }}</h1>
        </div>
		<div class="row">
			<div class="row">
				@if(session()->get('message'))
					<div class="alert alert-dismissible alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>{{ session()->get('message') }}</strong>.
					</div>
				@endif
			</div>
			@if(count($errors) > 0)
				<div class="row">
					<div class="alert alert-dismissible alert-warning">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			@endif
		</div>
        <div class="row col-md-6 pull-right">
            <form action="zodiacNew" method="post">
                {{ csrf_field() }}
                
				<div class="row">
					<div class="form-group col-md-6 col-md-offset-6">
						<label for="zodiac">Zodiac</label>
						<select class="form-control" id="zodiac" name="numberborg">
							@foreach($zodiacVars as $key => $value)
								<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-6">
						<input type="hidden" id="date" name="date" value="{{ $date }}">
					</div>
				</div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" id="body" name="title" rows="10" minlength="70" required></textarea>
                </div>
				<div class="form-group">
                    <button type="submit" class="btn btn-default">Add Zodiac</button>
                </div>
            </form>
        </div> 
    </div>
	<div class="row artist-details" id="artistDetails">
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
		
        @else
            <h4>There is no Zodiac in the specified date.</h4>
        @endif
    </div>
@endsection