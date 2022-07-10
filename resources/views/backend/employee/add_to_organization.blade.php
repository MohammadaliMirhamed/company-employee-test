@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Add Employee To Organization') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.addto' , ['id' => $employee_id, 'organization' => $organization]) }}">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">

                                    <label for="organization_id" class="col-md-4 col-form-label text-md-right">Select The {{ $organization }}</label>
                                    <select name="organization_id" id="organization_id">
                                        @foreach($organization_items as $organization_item)
                                            <option value="{{ $organization_item->id }}">{{ $organization_item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
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
