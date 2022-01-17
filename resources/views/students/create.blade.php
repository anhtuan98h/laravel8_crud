@extends('layouts.index')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card">
        <div class="card-header">
          <div class="card-header text-center text-danger text-bold">
            Laravel 8 Student IMAGE Create

          </div>
          <a href="{{ url('students') }}" class="btn btn-danger float-end">BACK</a>
          </h4>
        </div>
        <div class="card-body">
          @if(session('status'))
          <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
          </div>
          @endif
          <form action="{{ url('add-student') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group{{ $errors->has('student_name') ? ' has-error' : '' }}">
              <label for="student_name">Name</label>
              <input type="text" name="student_name" id="student_name" class="form-control" value="{{ old('student_name')}}">
              <small class="text-danger">{{ $errors->first('student_name') }}</small>
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} mb-3">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control" value="{{ old('image')}}">

              <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>



            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }} mb-3">
              <label for="birthday">Birthday</label>
              <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday')}}">

              <small class="text-danger">{{ $errors->first('birthday') }}</small>
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" class="form-control" value="{{ old('address')}}">
              <small class="text-danger">{{ $errors->first('address') }}</small>
            </div>

            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
              <label for="phone_number">Phone </label>
              <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number')}}">
              <small class="text-danger">{{ $errors->first('phone_number') }}</small>
            </div>
            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
              <label for="">Gender</label>
              <select name="gender" id="" class="form-control">
                <option value="0" selected>Nam</option>
                <option value="1">Nữ</option>
              </select>
              <small class="text-danger">{{ $errors->first('gender') }}</small>
            </div>
            <div class="form-group{{ $errors->has('faculty_id') ? ' has-error' : '' }}">
              <label for="">Student Faculty</label>
              <select name="faculty_id" id="" class="form-control">
                @foreach($students as $item =>$value)
                <option value="{{$value->id}}">{{$value->faculty_name}}</option>
                @endforeach
              </select>
              <small class="text-danger">{{ $errors->first('faculty_id') }}</small>
            </div> <br>
            <div class="form-group mb-3">
              <button type="submit" class="btn btn-primary">Save Student</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection