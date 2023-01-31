@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.machine.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.machines.update", [$machine->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.machine.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $machine->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code">{{ trans('cruds.machine.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $machine->code) }}">
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('induction') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="induction" value="0">
                    <input class="form-check-input" type="checkbox" name="induction" id="induction" value="1" {{ $machine->induction || old('induction', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="induction">{{ trans('cruds.machine.fields.induction') }}</label>
                </div>
                @if($errors->has('induction'))
                    <span class="text-danger">{{ $errors->first('induction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.induction_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $machine->active || old('active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.machine.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.active_helper') }}</span>
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