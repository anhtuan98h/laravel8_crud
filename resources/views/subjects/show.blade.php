@extends('layouts.index')
@section('content')
<div class="container">
  <div class="card col-md-10">
    <div class="card-header text-center text-danger text-bold">Show Subject</div>
    <div class="card-body">

      <div class="card-content">
        <strong class="card-title">Name : {{ $subjects->subject_name }}</strong>

      </div>

      </hr>

    </div>
  </div>
</div>

@stop