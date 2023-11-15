@extends('layouts.app')

@section('title')
    {{ 'List of Staff' }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
        <div class="hellojanu mb-3 ">
            <a href="{{ route('employee') }}" class="btn btn-dark mt-2">Back to List</a>

        </div>
        <div class="card mt-3 p-3" style="width: 1300px;">
            <h2 class="text-center">Staff Specific List</h2>
            <hr>
            <div class="mt-2 custom-alert">
                @if(session('error'))
                <div class="alert alert-danger" id="error-message">
                    {{ session('error') }}
                </div>
                @endif

                @if(session('Success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('Success') }}
                </div>
                @endif
            </div>
            <table class="table competition-datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>employee_id</th>
                        <th>user_id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Position</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff as $staffs)
                    <tr>
                        <td>{{ $staffs->id }}</td>
                        <td>{{$staffs->employee_id}}</td>
                        <td>{{$staffs->user_id}}</td>
                        <td>{{$staffs->name}}</td>
                        <td>{{ $staffs->email}}</td>
                        <td>{{ $staffs->salary}}</td>
                        <td>{{ $staffs->position}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection