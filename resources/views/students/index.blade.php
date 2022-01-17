@extends('layouts.index')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header text-center text-danger text-bold">
          Laravel 8 IMAGE Student View

        </div>
        <div class="card-body">
          <a href="{{ url('add-student')}}" class="btn btn-primary float-end"> <i class="fa fa-plus" aria-hidden="true"></i>New Student</a>
          <br>
          <br>
          <div class="table-responsive">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <table border="1" class="table table-dark">
              <thead>
                <tr>
                  <td class="f-bold" align="center">Order</td>
                  <td class="f-bold" align="center">Name</td>
                  <td class="f-bold" align="center">Image</td>
                  <td class="f-bold" align="center">Birthday</td>
                  <td class="f-bold" align="center">Address</td>
                  <td class="f-bold" align="center">Phone</td>
                  <td class="f-bold" align="center">Gender</td>
                  <td class="f-bold" align="center">Faculty</td>
                  <td class="f-bold" align="center">Actions</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $item)
                <tr>
                  <td align="center" class="table-light">{{ $item->id }}</td>
                  <td align="center" class="table-light">{{ $item->student_name }}</td>
                  <td align="center" class="table-light">
                    <img src="{{ asset('uploads/students/'.$item->image) }}" width="70px" height="70px" alt="Image">
                  </td align="center" class="table-light">
                  <td align="center" class="table-light">{{ $item->birthday }}</td>
                  <td align="center" class="table-light">{{ $item->address }}</td>
                  <td align="center" class="table-light">{{ $item->phone_number }}</td>
                  <td align="center" class="table-light">{{ $item->gender == 0 ? 'Nam' : 'Nữ' }}</td>
                  <td align="center" class="table-light">{{ $item->faculty_name }}</td>
                  <td align="center" class="table-light">

                    <a href="{{ url('edit-student/' . $item->id) }}" title="Edit Student"><button class="btn btn-success btn-sm"><i class="fad fa-pencil-alt"></i></button></a>
                    {!! Form::open(['url' => 'delete-student/'. $item->id,'accept-charset'=>'UTF-8','style'=>'display:inline']) !!}
                    <!-- <form method="POST" action="{{ url('delete-student/'. $item->id) }}" accept-charset="UTF-8" style="display:inline"> -->
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Faculty"><i class="fal fa-trash"></i></button>
                    <!-- </form> -->
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex">




            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection