@extends('layouts.app')
@section('title'){{ 'Create a Employee' }} @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="hellojanu mb-2">
                <a href="{{ route('employee') }}" class="btn btn-dark mt-2">Back to List</a>
            </div>
            <div class="card mt-3 p-3" style="width: 860px;">
                <h2 class="text-center">Update a Employee</h2>
                <hr>
                <form method="POST" action="{{route('employee.update',$employee->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="{{ $employee->name}}" class="form-control" />
                        @if($errors->has('name'))
                            <span class='text-danger'>{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="{{$employee->email}}" class="form-control" />
                        @if($errors->has('email'))
                            <span class='text-danger'>{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" value="{{$employee->password }}" class="form-control" />
                        @if($errors->has('password'))
                            <span class='text-danger'>{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" value="{{ $employee->address }}" class="form-control" />
                        @if($errors->has('address'))
                            <span class='text-danger'>{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="phone">Phone no:</label>
                        <input type="number" name="phone" id="phone" value="{{ $employee->phone }}" class="form-control" />
                        @if($errors->has('phone'))
                            <span class='text-danger'>{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="number" name="salary" id="salary" value="{{ $employee->salary }}" class="form-control" />
                        @if($errors->has('salary'))
                            <span class='text-danger'>{{ $errors->first('salary') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="date_of_birth">DOB:</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $employee->date_of_birth }}" class="form-control" />
                        @if($errors->has('date_of_birth'))
                            <span class='text-danger'>{{ $errors->first('date_of_birth') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <select name="position" id="position" class="form-control">
                            <option value="Hr" {{ $employee->position == 'Hr' ? 'selected' : '' }}>Project Manager</option>
                            <option value="Manager" {{ $employee->position == 'Manager' ? 'selected' : '' }}>HR Manager</option>
                            <option value="Developer" {{ $employee->position == 'Developer' ? 'selected' : '' }}>Developer</option>
                            <option value="Designer" {{ $employee->position == 'Designer' ? 'selected' : '' }}>Designer</option>
                            <option value="IT Support" {{ $employee->position == 'IT Support' ? 'selected' : '' }}>IT Support</option>
                            <option value="QA Engineer" {{ $employee->position == 'QA Engineer' ? 'selected' : '' }}>QA Engineer</option>
                            <option value="IT Trainee" {{ $employee->position == 'IT Trainee' ? 'selected' : '' }}>IT Trainee</option>
                        </select>
                        @if($errors->has('position'))
                            <span class='text-danger'>{{ $errors->first('position') }}</span>
                        @endif
                    </div>
                    <br>                    
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image"  class="form-control" />
                        @if($errors->has('image'))
                            <span class='text-danger'>{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark ml-auto">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
