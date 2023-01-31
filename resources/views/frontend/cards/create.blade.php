@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.card.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.cards.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="number">{{ trans('cruds.card.fields.number') }}</label>
                            <input class="form-control" type="text" name="number" id="number" value="{{ old('number', '') }}" required>
                            @if($errors->has('number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.card.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="rfid">{{ trans('cruds.card.fields.rfid') }}</label>
                            <input class="form-control" type="text" name="rfid" id="rfid" value="{{ old('rfid', '') }}">
                            @if($errors->has('rfid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rfid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.card.fields.rfid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.card.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.card.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                                <label for="active">{{ trans('cruds.card.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.card.fields.active_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="paid_for" value="0">
                                <input type="checkbox" name="paid_for" id="paid_for" value="1" {{ old('paid_for', 0) == 1 ? 'checked' : '' }}>
                                <label for="paid_for">{{ trans('cruds.card.fields.paid_for') }}</label>
                            </div>
                            @if($errors->has('paid_for'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paid_for') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.card.fields.paid_for_helper') }}</span>
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