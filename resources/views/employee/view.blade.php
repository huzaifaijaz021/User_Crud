@extends('layouts.app')
@section('title', 'View Specific Employee')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="hellojanu mb-2"><a href="{{ route('employee') }}" class="btn btn-dark mt-2">Back to List</a></div>
      <div class="card mt-3 p-3" style="width: 860px; height: 370px; ">
        <h2 class="text-center mt-4" >View Employee</h2>
        <hr>
        <div class="mt-3 justify-content-center">
        <ul>
          <div>
            <td><img src="/storage/user_images/{{ $employee->image }}" alt="" width="50px" height="50px"></td>
          </div>
          <div class="mt-2">
          <li>
            <strong>Name:</strong> {{ $employee->name }}
          </li>
          <li>
            <strong>Email:</strong> {{ $employee->email }}
          </li>
          <li>
            <strong>Address:</strong> {{ $employee->address }}
          </li>
          <li>
            <strong>Date_of_Birth:</strong> {{ $employee->date_of_birth }}
          </li>
          <li>
            <strong>Position:</strong> {{ $employee->position }}
          </li>
          <li>
            <strong>Phone:</strong> {{ $employee->phone }}
          </li>
          <li>
            <strong>Salary:</strong> {{ $employee->salary }}
          </li>
        </div>
        </ul>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
