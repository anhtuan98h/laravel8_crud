@extends('layouts.index')
@section('content')
<div class="card col-md-10">

  <div class="card-body">
    <a href="{{ url('faculty') }}" class="btn btn-danger float-end">BACK</a>
    <div class="card-header text-center text-danger text-bold">

      Laravel 8 Faculty Update

    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
    </div>
    @endif
    {!! Form::open(['url' => 'faculty/' .$faculties->id,'method'=>'put']) !!}
    <!-- <form action="{{ url('faculty/' .$faculties->id) }}" method="post"> -->
    {!! csrf_field() !!}
    @method("PATCH")
    {{ Form::hidden('id', $faculties->id) }}
    <!-- <input type="hidden" name="id" id="id" value="{{$faculties->id}}" id="id" /> -->

    <div class="form-group{{ $errors->has('faculty_name') ? ' has-error' : '' }}">
      {{ Form::label('faculty_name', '', ['class' => 'control-label']) }}
      <!-- <label for="faculty_name">Name</label> -->
      {{ Form::text('faculty_name',$faculties->faculty_name, ['class' => 'form-control']) }}
      <!-- <input type="text" name="faculty_name" id="faculty_name" class="form-control" value="{{$faculties->faculty_name}}"> -->

      <small class="text-danger">{{ $errors->first('faculty_name') }}</small>
    </div>
    <br>
    <div class="form-group ">
      {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
      <!-- <input type="submit" value="Update" class="btn btn-success"> -->
    </div>
    {!! Form::close() !!}

  </div>
</div>
@stop