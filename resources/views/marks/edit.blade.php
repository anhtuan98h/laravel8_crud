@extends('layouts.index')
@section('content')
<div class="card col-md-10">

  <div class="card-body">
    <div class="card-header text-center text-danger text-bold">
      Laravel 8 Mark Read

    </div>
    <form action="{{ url('mark/' .$marks->id) }}" method="post">
      {!! csrf_field() !!}
      @method("PATCH")
      <input type="hidden" name="id" id="id" value="{{$marks->id}}" id="id" />

      <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
        <label>Name</label></br>
        <select name="student_id" id="student_id" class="form-control">
          <option value="11" {{$marks->student_id=="11"?'selected':''}}>Tô Văn Tuấn</option>
          <option value="12" {{$marks->student_id=="12"?'selected':''}}>Nguyễn Việt Anh</option>
          <option value="20" {{$marks->student_id=="20"?'selected':''}}>Nghiêm Thị Hải Yến</option>
          <option value="21" {{$marks->student_id=="21"?'selected':''}}>Nghiêm Tiến Dũng</option>
        </select>
        <small class="text-danger">{{ $errors->first('student_id') }}</small>
      </div>


      <div class="form-group{{ $errors->has('subject_id') ? ' has-error' : '' }}">
        <label>Subject</label></br>
        <input type="text" name="subject_id" id="subject_id" value="{{$marks->subject_id}}" class="form-control"></br>

        <small class="text-danger">{{ $errors->first('subject_id') }}</small>
      </div>


      <div class="form-group{{ $errors->has('mark') ? ' has-error' : '' }}">
        <label>Mark</label></br>
        <select name="mark" id="mark" class="form-control">
          <option value="0" {{$marks->mark=="0"?'selected':''}}>0</option>
          <option value="1" {{$marks->mark=="1"?'selected':''}}>1</option>
          <option value="2" {{$marks->mark=="2"?'selected':''}}>2</option>
          <option value="3" {{$marks->mark=="3"?'selected':''}}>3</option>
          <option value="4" {{$marks->mark=="4"?'selected':''}}>4</option>
          <option value="5" {{$marks->mark=="5"?'selected':''}}>5</option>
          <option value="6" {{$marks->mark=="6"?'selected':''}}>6</option>
          <option value="7" {{$marks->mark=="7"?'selected':''}}>7</option>
          <option value="8" {{$marks->mark=="8"?'selected':''}}>8</option>
          <option value="9" {{$marks->mark=="9"?'selected':''}}>9</option>
          <option value="10" {{$marks->mark=="10"?'selected':''}}>10</option>
        </select>
        <small class="text-danger">{{ $errors->first('mark') }}</small>
      </div>

      <div class="form-group">
        <input type="submit" value="Update" class="btn btn-success"></br>
      </div>
    </form>

  </div>
</div>
@stop