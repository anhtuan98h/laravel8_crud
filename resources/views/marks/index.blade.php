@extends('layouts.index')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">

        <div class="card-body">
          <div class="card-header text-center text-danger text-bold">
            Laravel 8 Mark Read

          </div>
          <a href="{{ url('/mark/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
            <i class="fa fa-plus" aria-hidden="true"></i> Add
          </a>
          <br />
          <br />
          <div class="table-responsive">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-dark " border="1">
              <thead>
                <tr>
                  <td align="center" class="f-bold">Order</td>
                  <td align="center" class="f-bold">Name</td>
                  <td align="center" class="f-bold">Subject</td>
                  <td align="center" class="f-bold">Mark</td>
                  <td align="center" class="f-bold">Actions</td>
                </tr>
              </thead>
              <tbody>
                @foreach($marks as $item)
                <tr>
                  <td align="center" class="table-light">{{ $item->id }}</td>
                  <td align="center" class="table-light">{{ $item->student_name }}</td>
                  <td align="center" class="table-light">{{ $item->subject_name }}</td>
                  <td align="center" class="table-light">{{ $item->mark }}</td>
                  <td align="center" class="table-light">
                    <a href="{{ url('/mark/' . $item->id . '/edit') }}" title="Edit Student" class="btn btn-success btn-sm"> <i class="fa fa-pencil-square-o"></i></a>
                    <form method="POST" action="{{ url('/mark' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact"><i class="fal fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection