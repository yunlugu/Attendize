@extends('Shared.Layouts.Master')

@section('title')
	@parent

	{{ config('volunteers.name') }}
@stop

@section('top_nav')
	@include('Volunteers::layouts.TopNav')
@stop

@section('menu')
	@include('ManageEvent.Partials.Sidebar')
@stop

@section('page_title')
	{{ config('volunteers.name') }}
@stop

@section('head')

@stop

{{--
    @section('page_header')
    @stop
 --}}

@section('content')
	<h2>People currently registered</h2>
	<table class="table table-striped">
		<thead>
			<th>Name</th>
		</thead>
		<tbody>
			@foreach($volunteers as $volunteer)
				<tr>
					<td>{{ $volunteer->name }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop
