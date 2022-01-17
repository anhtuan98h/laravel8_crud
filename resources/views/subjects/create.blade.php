@extends('layouts.index')
@section('content')
<div class="card col-md-10">

  <div class="card-body">
    <a href="{{ url('subject') }}" class="btn btn-danger float-end">BACK</a>
    <div class="card-header text-center text-danger text-bold">
      Laravel 8 Faculty Create
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
    </div>
    @endif
    {!! Form::open(['url' => 'subject']) !!}
    <!-- <form action="{{ url('faculty') }}" method="post"> -->
    {!! csrf_field() !!}
    <div class="form-group{{ $errors->has('subject_name') ? ' has-error' : '' }}">
      {{ Form::label('subject_name', '', ['class' => 'control-label']) }}
      {{ Form::text('subject_name', old('subject_name'), ['class' => 'form-control']) }}
      <!-- <input type="text" name="faculty_name" id="faculty_name" class="form-control" value="{{ old('faculty_name')}}"> -->

      <small class="text-danger">{{ $errors->first('subject_name') }}</small>
    </div>
    <br>
    <div class="form-group">
      {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
      <!-- <input type="submit" value="Save" class="btn btn-success"> -->
    </div>
    {!! Form::close() !!}
    <!-- </form> -->


  </div>
</div>
@stop