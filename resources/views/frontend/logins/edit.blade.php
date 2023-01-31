@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.login.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.logins.update", [$login->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="machine_id">{{ trans('cruds.login.fields.machine') }}</label>
                            <select class="form-control select2" name="machine_id" id="machine_id" required>
                                @foreach($machines as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('machine_id') ? old('machine_id') : $login->machine->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('machine'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('machine') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.login.fields.machine_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="card_id">{{ trans('cruds.login.fields.card') }}</label>
                            <select class="form-control select2" name="card_id" id="card_id" required>
                                @foreach($cards as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('card_id') ? old('card_id') : $login->card->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('card'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('card') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.login.fields.card_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="status">{{ trans('cruds.login.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', $login->status) }}" step="1" required>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection