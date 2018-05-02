@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-left:5%;">
            <div class="pull-left">
                <h2>Employee Details</h2>
            </div>
            <div class="pull-right" style="margin-right:10%;">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">

             <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="width:90%;margin-left:8%">
                            <tr>
                                  <th><strong>Name</strong></th>
                                  <td>{{ $employee->name }}</td>
                            </tr>
                            <tr>
                                    <th><strong>Surname</strong></th>
                                    <td>{{ $employee->name }}</td>
                            </tr>
                             <tr>
                                    <th><strong>Idno</strong></th>
                                    <td>{{ $employee->idno }}</td>
                            </tr>
                             <tr>
                                    <th><strong>Mobileno</strong></th>
                                    <td>{{ $employee->mobileno }}</td>
                            </tr>
                             <tr>
                                    <th> <strong>Email</strong></th>
                                    <td>{{ $employee->email }}</td>
                            </tr>
                             <tr>
                                    <th><strong>DateOfBirth</strong></th>
                                    <td>{{ $employee->dateOfBirth }}</td>
                            </tr>
                             <tr>
                                    <th><strong>Language</strong></th>
                                    <td>{{ $employee->language }}</td>
                            </tr>
                             <tr>
                                    <th> <strong>Interests</strong></th>
                                   <td>{{ $employee->interests }}</td>
                            </tr>

                        </table>
                    </div>
             </div>            

    </div>
@endsection