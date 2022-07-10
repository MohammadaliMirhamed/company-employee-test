@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Team') }}
                </div>

                <div class="card-body">
                    @include('layouts.errors')
                    <form method="POST" action="{{ route('team.update', $team->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group">
                                <label for="department_id" class="col-md-4 col-form-label text-md-right">Select The Department</label>
                                <select name="department_id" id="department_id">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ $department->id == $team->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="team_name" class="col-md-4 col-form-label text-md-right">{{ __('Team Name') }}</label>
                                <div class="col-md-12">
                                    <input id="team_name" type="text" class="form-control{{ $errors->has('team_name') ? ' is-invalid' : '' }}" name="team_name" value="{{ old('team_name') ?? $team->name }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="leader_id" class="col-md-4 col-form-label text-md-right">{{ __('Leader Id') }}</label>
                                <div class="col-md-12">
                                    <input id="leader_id" type="text" class="form-control{{ $errors->has('leader_id') ? ' is-invalid' : '' }}" name="leader_id" value="{{ old('leader_id') ?? $team->leader_id }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
