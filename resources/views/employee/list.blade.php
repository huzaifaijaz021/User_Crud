@extends('layouts.app')

@section('title')
    {{ 'List of Employees' }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
         
            <div class="hellojanu mb-3">
                <a href="{{ route('staff') }}" class="btn btn-dark mt-2">Specific Staff</a>
                <a href="{{ route('employee.create') }}" class="btn btn-dark mt-2 mr-2">Create New Employee</a>
            </div>
            
        <div class="card mt-3 p-3" style="width: 1300px;">
            <h2 class="text-center">Employee list</h2>
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
                        <th>image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Position</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach($employee as $employees)
                    <tr>
                        <td>{{ $employees->id }}</td>
                        <td><img src="/storage/user_images/{{ $employees->image }}" alt="" width="30px" height="30px"></td>
                        <td>{{$employees->name}}</td>
                        <td>{{ $employees->email}}</td>
                        <td>{{ $employees->address}}</td>
                        <td>{{ $employees->phone}}</td>
                        <td>{{ $employees->salary}}</td>
                        <td>{{ $employees->position}}</td>
                        <td>{{ $employees->date_of_birth}}</td>
                        <td> <a class="btn btn-dark" href="{{route('employee.show',$employees->id)}}">View</a></td>
                        <td> <a class="btn btn-primary" href="{{route('employee.edit',$employees->id)}}">Edit</a></td>
                        <td> <a class="btn btn-danger" href="{{route('employee.destroy',$employees->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
    </div>
</div>
@endsection
@section('page_level_scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('.competition-datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('tabledata') }}",
            "columnDefs":[{
                "targets": [1, 9, 10, 11],
                "orderable": false
            }],
            "columns": [
                { data: 'id' },
             {
                data: 'image',
                render: function(data, type, row) {
                    return '<img src="{{ asset('storage/user_images/') }}/' + data + '" alt="User Image" width="40" height="40">';
                },
               }, 
                { data: 'name' },
                { data: 'email' },
                { data: 'phone' },
                {
                    data: 'salary', 
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return 'Rs: ' + data;
                        }
                        return data; 
                    }
                },
                {
                data: 'position',
                render: function(data, type, row){
                    if(data === 'Hr'){ 
                    return '<i class="fa fa-user" style="color: red;"></i>' + " " + data;
                    }else if(data === 'Manager'){
                    return '<i class="fa fa-user" style="color: blue;"></i>' + " " + data;
                    } else {
                    return '<i class="fa fa-user"></i>' + " " + data;
                    }
                }
                },
                {
                data: 'date_of_birth',
                render: function(data, type, row){
                    return '<i class="fa fa-calendar"></i>'+" " + data;
                }
                },
                { data: 'address' },
                {
                data: null,
                render: function (data, type, row) {
                    return '<a class="btn btn-dark" href="/employee/show/' + row.id + '">View</a>';
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return '<a class="btn btn-info" href="/employee/edit/' + row.id + '">Edit</a>';
                },
            },
            {
                data: null,
                render: function (data, type, row) {
                    return '<a class="btn btn-danger" href="/employee/destroy/' + row.id + '">Delete</a>';
                },
            },
            ],
             lengthMenu: [10, 15, 20, 50],
        });
    });
</script>
@endsection