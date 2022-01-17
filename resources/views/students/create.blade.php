@extends('layouts.index')

@section('content')

<div class="container">


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
        <div class="row">
          <div class="col-md-5">
            <div class="form-group{{ $errors->has('student_name') ? ' has-error' : '' }}">
              <label for="student_name">Name</label>
              <input type="text" name="student_name" id="student_name" class="form-control" value="{{ old('student_name')}}">
              <small class="text-danger">{{ $errors->first('student_name') }}</small>
            </div>





            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }} mb-3">
              <label for="birthday">Birthday</label>
              <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday')}}">

              <small class="text-danger">{{ $errors->first('birthday') }}</small>
            </div>



            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
              <label for="phone_number">Phone </label>
              <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number')}}">
              <small class="text-danger">{{ $errors->first('phone_number') }}</small>
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




          </div>




          <div class="col-md-5">

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} mb-3">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control" value="{{ old('image')}}">

              <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>


            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" class="form-control" value="{{ old('address')}}">
              <small class="text-danger">{{ $errors->first('address') }}</small>
            </div>


            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
              <label for="">Gender</label>
              <select name="gender" id="" class="form-control">
                <option value="0" selected>Nam</option>
                <option value="1">Nữ</option>
              </select>
              <small class="text-danger">{{ $errors->first('gender') }}</small>
            </div>






          </div>
        </div>

        <div class="col-md-6 form-group">
          <table class="table">
            <thead>
              <tr>
                <th>Subject</th>
                <th>Mark</th>
                <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" name="subject_name[]" class="form-control" required=""></td>
                <td><input type="text" name="mark[]" class="form-control"></td>
                <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
              </tr>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <div class="form-group">
                    <input type="submit" name="" value="Submit" class="btn btn-success">
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </form>

    </div>
  </div>

</div>

@endsection