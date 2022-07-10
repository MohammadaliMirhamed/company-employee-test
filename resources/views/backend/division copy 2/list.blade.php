@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Team List') }}
                </div>

                <div class="card-body">
                    <a href="{{ route('team.create') }}" class="btn btn-success">
                        New Team
                    </a>

                   @include('layouts.alerts')

                    @if (count($teams) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Leader</th>
                                    <th>Department</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->id }}</td>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->leader->full_name }}</td>
                                        <td>{{ $team->department->name }}</td>
                                        <td>
                                            <form action="{{ route('team.destroy', $team->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('team.edit', $team->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {{ $teams->links() }}
                        </div>
                    @else
                        <p>No teams found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
