@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.users.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.user.fields.status') }}</label>
                            @foreach(App\Models\User::STATUS_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', 'joining') === (string) $key ? 'checked' : '' }} required>
                                    <label for="status_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="surname">{{ trans('cruds.user.fields.surname') }}</label>
                            <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname', '') }}" required>
                            @if($errors->has('surname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('surname') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.surname_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple required>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.standing_order') }}</label>
                            @foreach(App\Models\User::STANDING_ORDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="standing_order_{{ $key }}" name="standing_order" value="{{ $key }}" {{ old('standing_order', 'no') === (string) $key ? 'checked' : '' }}>
                                    <label for="standing_order_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('standing_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('standing_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.standing_order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="standing_order_name">{{ trans('cruds.user.fields.standing_order_name') }}</label>
                            <input class="form-control" type="text" name="standing_order_name" id="standing_order_name" value="{{ old('standing_order_name', '') }}">
                            @if($errors->has('standing_order_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('standing_order_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.standing_order_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="direct_debit" value="0">
                                <input type="checkbox" name="direct_debit" id="direct_debit" value="1" {{ old('direct_debit', 0) == 1 ? 'checked' : '' }}>
                                <label for="direct_debit">{{ trans('cruds.user.fields.direct_debit') }}</label>
                            </div>
                            @if($errors->has('direct_debit'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('direct_debit') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.direct_debit_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="welcome_email" value="0">
                                <input type="checkbox" name="welcome_email" id="welcome_email" value="1" {{ old('welcome_email', 0) == 1 ? 'checked' : '' }}>
                                <label for="welcome_email">{{ trans('cruds.user.fields.welcome_email') }}</label>
                            </div>
                            @if($errors->has('welcome_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('welcome_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.welcome_email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="mailchimp" value="0">
                                <input type="checkbox" name="mailchimp" id="mailchimp" value="1" {{ old('mailchimp', 0) == 1 ? 'checked' : '' }}>
                                <label for="mailchimp">{{ trans('cruds.user.fields.mailchimp') }}</label>
                            </div>
                            @if($errors->has('mailchimp'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mailchimp') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.mailchimp_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.discourse') }}</label>
                            @foreach(App\Models\User::DISCOURSE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="discourse_{{ $key }}" name="discourse" value="{{ $key }}" {{ old('discourse', 'no') === (string) $key ? 'checked' : '' }}>
                                    <label for="discourse_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('discourse'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('discourse') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.discourse_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="postal_address">{{ trans('cruds.user.fields.postal_address') }}</label>
                            <textarea class="form-control ckeditor" name="postal_address" id="postal_address">{!! old('postal_address') !!}</textarea>
                            @if($errors->has('postal_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('postal_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.postal_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.user.fields.notes') }}</label>
                            <textarea class="form-control ckeditor" name="notes" id="notes">{!! old('notes') !!}</textarea>
                            @if($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.notes_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('frontend.users.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $user->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection