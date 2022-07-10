@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('New Division') }}
                </div>

                <div class="card-body">
                    @include('layouts.errors')
                    <form method="POST" action="{{ route('division.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="division_name" class="col-md-4 col-form-label text-md-right">{{ __('Division Name') }}</label>
                                <div class="col-md-12">
                                    <input id="division_name" type="text" class="form-control{{ $errors->has('division_name') ? ' is-invalid' : '' }}" name="division_name" value="{{ old('division_name') }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="leader_id" class="col-md-4 col-form-label text-md-right">{{ __('Leader Id') }}</label>
                                <div class="col-md-12">
                                    <input id="leader_id" type="text" class="form-control{{ $errors->has('leader_id') ? ' is-invalid' : '' }}" name="leader_id" value="{{ old('leader_id') }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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
