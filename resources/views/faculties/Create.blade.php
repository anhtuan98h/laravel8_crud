@extends('faculties.layout')
@section('content')
<div class="card">
  <div class="card-header">Faculty Page</div>
  <div class="card-body">

    <form action="{{ url('faculty') }}" method="post">
      {!! csrf_field() !!}
      <label>Name</label></br>
      <input type="text" name="name" id="name" class="form-control"></br>
      <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    <style>
      .card {
        margin-top: 50px;
      }

      .card-header {
        color: #fff;
        background-color: #5581f1;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
      }

      .card-body {
        border-bottom: 2px solid #5581f1;
        border-left: 2px solid #5581f1;
        border-right: 2px solid #5581f1;

      }
    </style>
  </div>
</div>
@stop