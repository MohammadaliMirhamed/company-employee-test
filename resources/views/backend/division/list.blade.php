@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Division List') }}
                </div>

                <div class="card-body">
                    <a href="{{ route('division.create') }}" class="btn btn-success">
                        New Division
                    </a>

                   @include('layouts.alerts')

                    @if (count($divisions) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Leader</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisions as $division)
                                    <tr>
                                        <td>{{ $division->id }}</td>
                                        <td>{{ $division->name }}</td>
                                        <td>{{ $division->leader->full_name }}</td>
                                        <td>
                                            <form action="{{ route('division.destroy', $division->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('division.edit', $division->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {{ $divisions->links() }}
                        </div>
                    @else
                        <p>No divisions found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
