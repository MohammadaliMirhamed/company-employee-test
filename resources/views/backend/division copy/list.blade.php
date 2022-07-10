@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Department List') }}
                </div>

                <div class="card-body">
                    <a href="{{ route('department.create') }}" class="btn btn-success">
                        New Department
                    </a>

                   @include('layouts.alerts')

                    @if (count($departments) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Leader</th>
                                    <th>Division</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $department->id }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->leader->full_name }}</td>
                                        <td>{{ $department->division->name }}</td>
                                        <td>
                                            <form action="{{ route('department.destroy', $department->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('department.edit', $department->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {{ $departments->links() }}
                        </div>
                    @else
                        <p>No departments found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
