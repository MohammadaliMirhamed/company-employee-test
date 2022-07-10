@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Department') }}
                </div>

                <div class="card-body">
                    @include('layouts.errors')
                    <form method="POST" action="{{ route('department.update', $department->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group">
                                <label for="department_id" class="col-md-4 col-form-label text-md-right">Select The Department</label>
                                <select name="department_id" id="department_id">
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}" {{ $division->id == $department->division_id ? 'selected' : '' }}>{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="department_name" class="col-md-4 col-form-label text-md-right">{{ __('Department Name') }}</label>
                                <div class="col-md-12">
                                    <input id="department_name" type="text" class="form-control{{ $errors->has('department_name') ? ' is-invalid' : '' }}" name="department_name" value="{{ old('department_name') ?? $department->name }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="leader_id" class="col-md-4 col-form-label text-md-right">{{ __('Leader Id') }}</label>
                                <div class="col-md-12">
                                    <input id="leader_id" type="text" class="form-control{{ $errors->has('leader_id') ? ' is-invalid' : '' }}" name="leader_id" value="{{ old('leader_id') ?? $department->leader_id }}" autofocus>
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
