@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.login.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.logins.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="machine_id">{{ trans('cruds.login.fields.machine') }}</label>
                <select class="form-control select2 {{ $errors->has('machine') ? 'is-invalid' : '' }}" name="machine_id" id="machine_id" required>
                    @foreach($machines as $id => $entry)
                        <option value="{{ $id }}" {{ old('machine_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('machine'))
                    <span class="text-danger">{{ $errors->first('machine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.login.fields.machine_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="card_id">{{ trans('cruds.login.fields.card') }}</label>
                <select class="form-control select2 {{ $errors->has('card') ? 'is-invalid' : '' }}" name="card_id" id="card_id" required>
                    @foreach($cards as $id => $entry)
                        <option value="{{ $id }}" {{ old('card_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('card'))
                    <span class="text-danger">{{ $errors->first('card') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.login.fields.card_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.login.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', '103') }}" step="1" required>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.login.fields.status_helper') }}</span>
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