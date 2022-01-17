@extends('layouts.index')
@section('content')
<div class="card col-md-10">
  <div class="card-header text-center text-danger text-bold">Mark</div>
  <div class="card-body">

    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
    </div>
    @endif

    <form action="{{ url('mark') }}" method="post">
      {!! csrf_field() !!}
      <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
        <label for="">Name</label>
        <select name="student_id" id="" class="form-control">
          <option value="11">Tô Văn Tuấn</option>
          <option value="12">Nguyễn Việt Anh</option>
          <option value="20">Nghiêm Thị Hải Yến</option>
          <option value="21">Nghiêm Tiến Dũng</option>
        </select>
        <small class="text-danger">{{ $errors->first('student_id') }}</small>
      </div>

      <div class="form-group{{ $errors->has('subject_id') ? ' has-error' : '' }}">
        <label for="">Subject</label>
        <!-- {{ Form::label('faculty_name', '', ['class' => 'control-label']) }}
      {{ Form::text('faculty_name', old('faculty_name'), ['class' => 'form-control']) }} -->
        <select name="subject_id" id="" class="form-control">
          @foreach($marks as $item=>$value)
          <option value="{{$value->subject_id}}">{{$value->subject_name}}</option>
          @endforeach
        </select>
        <!-- <input type="text" name="subject_id" id="subject_id" class="form-control" value="{{ old('subject_id')}}"> -->

        <small class="text-danger">{{ $errors->first('subject_id') }}</small>
      </div>


      <div class="form-group{{ $errors->has('mark') ? ' has-error' : '' }}">
        <label>Mark</label></br>
        <select name="mark" id="" class="form-control">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
        <small class="text-danger">{{ $errors->first('mark') }}</small>
      </div>


      <div class="form-group">
        <input type="submit" value="Save" class="btn btn-success">
      </div>
    </form>

  </div>
</div>
@stop