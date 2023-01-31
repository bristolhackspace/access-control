@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.user.fields.status') }}</label>
                @foreach(App\Models\User::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $user->status) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="surname">{{ trans('cruds.user.fields.surname') }}</label>
                <input class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" name="surname" id="surname" value="{{ old('surname', $user->surname) }}" required>
                @if($errors->has('surname'))
                    <span class="text-danger">{{ $errors->first('surname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.surname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.standing_order') }}</label>
                @foreach(App\Models\User::STANDING_ORDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('standing_order') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="standing_order_{{ $key }}" name="standing_order" value="{{ $key }}" {{ old('standing_order', $user->standing_order) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="standing_order_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('standing_order'))
                    <span class="text-danger">{{ $errors->first('standing_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.standing_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="standing_order_name">{{ trans('cruds.user.fields.standing_order_name') }}</label>
                <input class="form-control {{ $errors->has('standing_order_name') ? 'is-invalid' : '' }}" type="text" name="standing_order_name" id="standing_order_name" value="{{ old('standing_order_name', $user->standing_order_name) }}">
                @if($errors->has('standing_order_name'))
                    <span class="text-danger">{{ $errors->first('standing_order_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.standing_order_name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('direct_debit') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="direct_debit" value="0">
                    <input class="form-check-input" type="checkbox" name="direct_debit" id="direct_debit" value="1" {{ $user->direct_debit || old('direct_debit', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="direct_debit">{{ trans('cruds.user.fields.direct_debit') }}</label>
                </div>
                @if($errors->has('direct_debit'))
                    <span class="text-danger">{{ $errors->first('direct_debit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.direct_debit_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('welcome_email') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="welcome_email" value="0">
                    <input class="form-check-input" type="checkbox" name="welcome_email" id="welcome_email" value="1" {{ $user->welcome_email || old('welcome_email', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="welcome_email">{{ trans('cruds.user.fields.welcome_email') }}</label>
                </div>
                @if($errors->has('welcome_email'))
                    <span class="text-danger">{{ $errors->first('welcome_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.welcome_email_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('mailchimp') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="mailchimp" value="0">
                    <input class="form-check-input" type="checkbox" name="mailchimp" id="mailchimp" value="1" {{ $user->mailchimp || old('mailchimp', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="mailchimp">{{ trans('cruds.user.fields.mailchimp') }}</label>
                </div>
                @if($errors->has('mailchimp'))
                    <span class="text-danger">{{ $errors->first('mailchimp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.mailchimp_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.discourse') }}</label>
                @foreach(App\Models\User::DISCOURSE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('discourse') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="discourse_{{ $key }}" name="discourse" value="{{ $key }}" {{ old('discourse', $user->discourse) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="discourse_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('discourse'))
                    <span class="text-danger">{{ $errors->first('discourse') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.discourse_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="postal_address">{{ trans('cruds.user.fields.postal_address') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('postal_address') ? 'is-invalid' : '' }}" name="postal_address" id="postal_address">{!! old('postal_address', $user->postal_address) !!}</textarea>
                @if($errors->has('postal_address'))
                    <span class="text-danger">{{ $errors->first('postal_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.postal_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="membership_end_date">{{ trans('cruds.user.fields.membership_end_date') }}</label>
                <input class="form-control date {{ $errors->has('membership_end_date') ? 'is-invalid' : '' }}" type="text" name="membership_end_date" id="membership_end_date" value="{{ old('membership_end_date', $user->membership_end_date) }}">
                @if($errors->has('membership_end_date'))
                    <span class="text-danger">{{ $errors->first('membership_end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.membership_end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.user.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $user->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
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
                xhr.open('POST', '{{ route('admin.users.storeCKEditorImages') }}', true);
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