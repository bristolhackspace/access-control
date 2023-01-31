@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.answer.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.answers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="question_id">{{ trans('cruds.answer.fields.question') }}</label>
                            <select class="form-control select2" name="question_id" id="question_id" required>
                                @foreach($questions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.question_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="order">{{ trans('cruds.answer.fields.order') }}</label>
                            <input class="form-control" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1">
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="text">{{ trans('cruds.answer.fields.text') }}</label>
                            <input class="form-control" type="text" name="text" id="text" value="{{ old('text', '') }}" required>
                            @if($errors->has('text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="correct" value="0">
                                <input type="checkbox" name="correct" id="correct" value="1" {{ old('correct', 0) == 1 ? 'checked' : '' }}>
                                <label for="correct">{{ trans('cruds.answer.fields.correct') }}</label>
                            </div>
                            @if($errors->has('correct'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('correct') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.answer.fields.correct_helper') }}</span>
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