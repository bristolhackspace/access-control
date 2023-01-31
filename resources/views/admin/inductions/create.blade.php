@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.induction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.inductions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.induction.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.induction.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="machine_id">{{ trans('cruds.induction.fields.machine') }}</label>
                <select class="form-control select2 {{ $errors->has('machine') ? 'is-invalid' : '' }}" name="machine_id" id="machine_id" required>
                    @foreach($machines as $id => $entry)
                        <option value="{{ $id }}" {{ old('machine_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('machine'))
                    <span class="text-danger">{{ $errors->first('machine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.induction.fields.machine_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('inductor') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="inductor" value="0">
                    <input class="form-check-input" type="checkbox" name="inductor" id="inductor" value="1" {{ old('inductor', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="inductor">{{ trans('cruds.induction.fields.inductor') }}</label>
                </div>
                @if($errors->has('inductor'))
                    <span class="text-danger">{{ $errors->first('inductor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.induction.fields.inductor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inducted_by_id">{{ trans('cruds.induction.fields.inducted_by') }}</label>
                <select class="form-control select2 {{ $errors->has('inducted_by') ? 'is-invalid' : '' }}" name="inducted_by_id" id="inducted_by_id">
                    @foreach($inducted_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('inducted_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('inducted_by'))
                    <span class="text-danger">{{ $errors->first('inducted_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.induction.fields.inducted_by_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection