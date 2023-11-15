@extends('layouts.app')
@section('title'){{ 'Create a Employee' }} @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class= "hellojanu mb-2">
                <a href="{{ route('employee') }}" class="btn btn-dark mt-2">Back to List</a>
            </div>
            <div class="card mt-3 p-3" style="width: 860px;">
                <h2 class="text-center">Create an Employee</h2>
                <hr>
                <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Your Name"/>
                        @if($errors->has('name'))
                            <span class='text-danger'>{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Enter your Email" />
                        @if($errors->has('email'))
                            <span class='text-danger'>{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="Enter your Password" />
                        @if($errors->has('password'))
                            <span class='text-danger'>{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control" placeholder="Enter your Address" />
                        @if($errors->has('address'))
                            <span class='text-danger'>{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="phone">Phone No:</label>
                        <input type="number" name="phone" id="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter your Phone Number" />
                        @if($errors->has('phone'))
                            <span class='text-danger'>{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="number" name="salary" id="salary" value="{{ old('salary') }}" class="form-control" placeholder="Enter your Salary" />
                        @if($errors->has('salary'))
                            <span class='text-danger'>{{ $errors->first('salary') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="date_of_birth">Date_of_Birth:</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control" placeholder="Enter your DOB" />
                        @if($errors->has('date_of_birth'))
                            <span class='text-danger'>{{ $errors->first('date_of_birth') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <select name="position" id="position" value="{{ old('position') }}" class="form-control">
                            <option value="" selected disabled>Choose a Position</option>
                            <option value="Hr">Project Manager</option>
                            <option value="Manager">HR Manager</option>
                            <option value="Developer">Developer</option>
                            <option value="Designer">Designer</option>
                            <option value="IT Support">IT Support</option>
                            <option value="Designer">QA Engineer</option>
                            <option value="IT Trainee">IT Trainee</option>
                        </select>
                        @if($errors->has('position'))
                            <span class='text-danger'>{{ $errors->first('position') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" value="{{ old('image') }}" class="form-control"  />
                        @if($errors->has('image'))
                            <span class='text-danger'>{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark ml-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
