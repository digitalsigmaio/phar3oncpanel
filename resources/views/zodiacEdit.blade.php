@extends('layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3 content-insert">
        <div class="row">
            <h3>Edit Zodiac</h3>
        </div>
        <div class="row">
            <form action="/phar3oncpanel/public/zodiacEdit/{{ $zodiac->id }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $zodiac->id }}" name="id"> 
				<div class="row">
					<div class="form-group col-md-6">
						<label for="zodiac">Zodiac</label>
						<select class="form-control" id="zodiac" name="numberborg">
							@foreach($zodiacVars as $key => $value)
								<option value="{{ $key }}" {{ $key == $zodiac->numberborg ? 'selected' : '' }} >{{ $value }}</option>
							@endforeach
						</select>
					</div>
				</div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" id="body" name="title" rows="10">{{ $zodiac->title }}</textarea>
                </div>
				<div class="form-group">
                    <button type="submit" class="btn btn-default">Edit Zodiac</button>
                </div>
            </form>
        </div>
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
@endsection