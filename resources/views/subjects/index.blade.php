@extends('layouts.index')
@section('content')

<div class="container">
  <div id="row justify-content-center">

    <div class="row">
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
            <div class="card-header text-center text-danger text-bold">
              Laravel Subject VIEW

            </div>
            <a href="{{ url('/subject/create') }}" class="btn btn-success float-end" title="Add New Contact">
              <i class="fa fa-plus" aria-hidden="true"></i> New
            </a>
            <br />
            <br />

            <div class="table-responsive">
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
              <table class="table table-dark" border="1">
                <thead>
                  <tr>
                    <td class="f-bold" align="center">Order</td>
                    <td class="f-bold" align="center">Name</td>
                    <td class="f-bold" align="center">Actions</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach($subjects as $item)
                  <tr>
                    <td align="center" class="table-light">{{ $item->subject_id }}</td>
                    <td align="center" class="table-light">{{ $item->subject_name }}</td>

                    <td align="center" class="table-light">
                      <a href="{{ url('/subject/' . $item->subject_id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="far fa-eye"></i></button></a>
                      <a href="{{ url('/subject/' . $item->subject_id . '/edit') }}" title="Edit Student"><button class="btn btn-success btn-sm"><i class="fad fa-pencil-alt"></i></button></a>
                      {!! Form::open(['url' => '/subject' . '/' . $item->subject_id,'accept-charset'=>'UTF-8','style'=>'display:inline']) !!}
                      <!-- <form method="POST" action="{{ url('/faculty' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline"> -->
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Faculty"><i class="fal fa-trash"></i></button>
                      {!! Form::close() !!}
                      <!-- </form> -->

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex">

                {{$subjects-> links()}}


              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection