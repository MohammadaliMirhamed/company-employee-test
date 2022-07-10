@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Employee List') }}
                </div>

                <div class="card-body">
                    <a href="{{ route('employee.create') }}" class="btn btn-success">
                        New Employee
                    </a>

                   @include('layouts.alerts')

                    @if (count($employees) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>
                                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink-{{$employee->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Add
                                                </a>
                                                
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-{{$employee->id}}">
                                                    <a class="dropdown-item" href="{{route('employee.addto', ['id' => $employee->id, 'organization' => 'division'])}}">To Division</a>
                                                    <a class="dropdown-item" href="{{route('employee.addto', ['id' => $employee->id, 'organization' => 'department'])}}">To Department</a>
                                                    <a class="dropdown-item" href="{{route('employee.addto', ['id' => $employee->id, 'organization' => 'team'])}}">To Team</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {{ $employees->links() }}
                        </div>
                    @else
                        <p>No employees found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
