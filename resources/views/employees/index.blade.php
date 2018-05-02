@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="margin-left:5%;">
                <h2>ProPay Employee Management System</h2>
            </div>
            <div class="pull-right" style="margin-right:5%;">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Add New Employee</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Idno</th>
                <th>Mobileno</th>
                <th>Email</th>
                <th>DateOfBirth</th>
                <th>Language</th>
                <th>Interests</th>
                
                <th width="280px">Action</th>
            </tr>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->surname }}</td>
                <td>{{ $employee->idno }}</td>
                <td>{{ $employee->mobileno }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->dateOfBirth }}</td>
                <td>{{ $employee->language }}</td>
                <td>{{ $employee->interests }}</td>
                <td>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">View</a>

                        <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>


    {!! $employees->links() !!}


@endsection

