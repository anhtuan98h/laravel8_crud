@extends('faculties.layout')
@section('content')
<div class="card">
  <div class="card-header">Faculty Page</div>
  <div class="card-body">

    <div class="card-content">
      <strong class="card-title">Name : {{ $faculties->name }}</strong>

    </div>

    </hr>
    <style>
      .card {
        width: 600px;
        height: auto;
        margin: 50px auto;
      }

      .card-body {
        text-align: center;
        border-bottom: 2px solid #5581f1;
        border-left: 2px solid #5581f1;
        border-right: 2px solid #5581f1;

      }



      .card-header {
        color: #fff;
        background-color: #5581f1 !important;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
      }
    </style>
  </div>
</div>