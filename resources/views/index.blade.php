@extends('layouts.master')

@section('content')
    <div class="row">
        <div style="padding-top: 50px;">
			<div class="col-md-6 col-md-offset-6 pick">
				<div class="row">
					<h1>أختار يوم</h1>
				</div>
				<div class="row">
					<form action="selectedDate" method="post">
						{{ csrf_field() }}
						
						<div class="row">
							
							<div class="form-group col-md-6 pull-right">
								<input class="form-control" type="date" id="date" name="date" required>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default">تنفيذ</button>
						</div>
					</form>
				</div>
			</div>
		</div>
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
@endsection