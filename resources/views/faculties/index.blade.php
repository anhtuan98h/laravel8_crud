@extends('faculties.layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Faculty</div>
        <div class="card-body">
          <a href="{{ url('/faculty/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a>
          <br />
          <br />
          <style>
            .f-bold {
              font-weight: bold;
              color: #fff;
            }

            .card-body {
              border-bottom: 2px solid #5581f1;
              border-left: 2px solid #5581f1;
              border-right: 2px solid #5581f1;

            }

            html {
              font-family: Arial, Helvetica, sans-serif;
              font-size: 15px;

            }

            .card-header {
              color: #fff;
              background-color: #5581f1;
              text-align: center;
              text-transform: uppercase;
              font-weight: bold;
            }

            .container {
              margin-top: 50px;

            }

            .row {
              justify-content: center;
            }
          </style>
          <div class="table-responsive">
            <table class="table table-Dark boder-r">
              <thead>
                <tr>
                  <td class="f-bold" align="center">Order</td>
                  <td class="f-bold" align="center">Name</td>
                  <td class="f-bold" align="center">Actions</td>
                </tr>
              </thead>
              <tbody>
                @foreach($faculties as $item)
                <tr>
                  <td align="center" class="table-light">{{ $loop->iteration }}</td>
                  <td align="center" class="table-light">{{ $item->name }}</td>

                  <td align="center" class="table-light">
                    <a href="{{ url('/faculty/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="far fa-eye"></i></button></a>
                    <a href="{{ url('/faculty/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-success btn-sm"><i class="fad fa-pencil-alt"></i></button></a>
                    <form method="POST" action="{{ url('/faculty' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Faculty"><i class="fal fa-trash"></i></button>

                    </form>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex">

              {{$faculties -> links()}}


            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection