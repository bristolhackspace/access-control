@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.induction.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.inductions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.induction.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.induction.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="machine_id">{{ trans('cruds.induction.fields.machine') }}</label>
                            <select class="form-control select2" name="machine_id" id="machine_id" required>
                                @foreach($machines as $id => $entry)
                                    <option value="{{ $id }}" {{ old('machine_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('machine'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('machine') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.induction.fields.machine_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="inductor" value="0">
                                <input type="checkbox" name="inductor" id="inductor" value="1" {{ old('inductor', 0) == 1 ? 'checked' : '' }}>
                                <label for="inductor">{{ trans('cruds.induction.fields.inductor') }}</label>
                            </div>
                            @if($errors->has('inductor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('inductor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.induction.fields.inductor_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="inducted_by_id">{{ trans('cruds.induction.fields.inducted_by') }}</label>
                            <select class="form-control select2" name="inducted_by_id" id="inducted_by_id">
                                @foreach($inducted_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('inducted_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('inducted_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('inducted_by') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection