@extends('layouts.index')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <div class="card-header text-center text-danger text-bold">
            Laravel 8 Student IMAGE Update

          </div>
          <a href="{{ url('students') }}" class="btn btn-danger float-end">BACK</a>
          </h4>
        </div>
        <div class="card-body">

          {!! Form::open(['url' =>'update-student/'.$student->id,'method'=>'put'
          ,'enctype'=>'multipart/form-data']) !!}
          <!-- <form action="{{ url('update-student/'.$student->id) }}" method="POST" enctype="multipart/form-data"> -->
          @csrf
          @method('PUT')
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <!-- <label for="name">Name</label> -->
            {{ Form::label('name', '', ['class' => 'control-label']) }}
            {{ Form::text('student_name', $student->student_name, ['class' => 'form-control']) }}
            <!-- <input type="text" name="name" id="name" class="form-control" value="{{$student->name}}"> -->
            <small class="text-danger">{{ $errors->first('student_name') }}</small>
          </div>

          <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} mb-3">
            {{ Form::label('Image', '', ['class' => 'control-label']) }}
            {{ Form::file('image', ['class' => 'form-control']) }}
            <!-- <input type="file" name="image" class="form-control"> -->
            <img src="{{ asset('uploads/students/'.$student->image) }}" width="70px" height="70px" alt="Image">
            <small class="text-danger">{{ $errors->first('image')}}</small>
          </div>

          <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }} mb-3">
            {{ Form::label('birthday', '', ['class' => 'control-label']) }}
            {{ Form::date('birthday', $student->birthday, ['class' => 'form-control']) }}
            <!-- <input type="birthday" name="birthday" id="birthday" class="form-control" value="{{$student->birthday}}"> -->

            <small class="text-danger">{{ $errors->first('birthday') }}</small>
          </div>


          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            {{ Form::label('Address', '', ['class' => 'control-label']) }}
            {{ Form::text('address', $student->address, ['class' => 'form-control']) }}
            <!-- <input type="text" name="address" id="address" class="form-control" value="{{$student->address}}"> -->
            <small class="text-danger">{{ $errors->first('address') }}</small>
          </div>


          <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
            {{ Form::label('Phone', '', ['class' => 'control-label']) }}
            {{ Form::text('phone_number', $student->phone_number, ['class' => 'form-control']) }}
            <!-- <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{$student->phone_number}}"> -->
            <small class="text-danger">{{ $errors->first('phone_number') }}</small>
          </div>

          <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            {{ Form::label('Gender', '', ['class' => 'control-label']) }}
            <select name="gender" id="" class="form-control">
              <option value="0" {{$student->gender=="0"?'selected':''}}> Nam</option>
              <option value="1" {{$student->gender=="1"?'selected':''}}>Nữ</option>
            </select>
            <small class="text-danger">{{ $errors->first('gender') }}</small>
          </div>
          <div class="form-group{{ $errors->has('faculty_id') ? ' has-error' : '' }}">
            {{ Form::label('Faculty', '', ['class' => 'control-label']) }}
            <select name="faculty_id" id="" class="form-control">
              <option value="2" {{$student->faculty_id=="2"?'selected':''}}>Công nghệ thông tin</option>
              <option value="3" {{$student->faculty_id=="3"?'selected':''}}>Quản trị kinh doanh</option>
              <option value="4" {{$student->faculty_id=="4"?'selected':''}}>Cơ khí</option>
              <option value="5" {{$student->faculty_id=="5"?'selected':''}}>Kinh tế</option>
              <option value="11" {{$student->faculty_id=="11"?'selected':''}}>Xây dựng</option>
              <option value="15" {{$student->faculty_id=="15"?'selected':''}}>Điện- Điện tử</option>
              <option value="19" {{$student->faculty_id=="19"?'selected':''}}>Du lịch</option>
              <option value="38" {{$student->faculty_id=="38"?'selected':''}}>Tiếng Nga</option>
              <option value="40" {{$student->faculty_id=="40"?'selected':''}}>Công trình</option>
              <option value="41" {{$student->faculty_id=="41"?'selected':''}}>Tiếng Anh</option>
            </select>
            <small class="text-danger">{{ $errors->first('faculty_id') }}</small>
          </div>
          <br>

          <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Update Student</button>
          </div>

          <!-- </form> -->
          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>
</div>

@endsection