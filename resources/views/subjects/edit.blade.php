@extends('layouts.index')
@section('content')
<div class="card col-md-10">

  <div class="card-body">
    <a href="{{ url('subject') }}" class="btn btn-danger float-end">BACK</a>
    <div class="card-header text-center text-danger text-bold">

      Laravel 8 Subject Update

    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
    </div>
    @endif
    {!! Form::open(['url' => 'subject/' .$subjects->subject_id,'method'=>'put']) !!}

    {!! csrf_field() !!}
    @method("PATCH")
    {{ Form::hidden('subject_id', $subjects->subject_id) }}
    <div class="form-group{{ $errors->has('subject_name') ? ' has-error' : '' }}">
      {{ Form::label('subject_name', '', ['class' => 'control-label']) }}

      {{ Form::text('subject_name',$subjects->subject_name, ['class' => 'form-control']) }}


      <small class="text-danger">{{ $errors->first('subject_name') }}</small>
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