@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\User::STATUS_RADIO[$user->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.surname') }}
                        </th>
                        <td>
                            {{ $user->surname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.standing_order') }}
                        </th>
                        <td>
                            {{ App\Models\User::STANDING_ORDER_RADIO[$user->standing_order] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.standing_order_name') }}
                        </th>
                        <td>
                            {{ $user->standing_order_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.direct_debit') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->direct_debit ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.welcome_email') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->welcome_email ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.mailchimp') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->mailchimp ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.discourse') }}
                        </th>
                        <td>
                            {{ App\Models\User::DISCOURSE_RADIO[$user->discourse] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.postal_address') }}
                        </th>
                        <td>
                            {!! $user->postal_address !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.membership_end_date') }}
                        </th>
                        <td>
                            {{ $user->membership_end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.notes') }}
                        </th>
                        <td>
                            {!! $user->notes !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#user_cards" role="tab" data-toggle="tab">
                {{ trans('cruds.card.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_inductions" role="tab" data-toggle="tab">
                {{ trans('cruds.induction.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_cards">
            @includeIf('admin.users.relationships.userCards', ['cards' => $user->userCards])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_inductions">
            @includeIf('admin.users.relationships.userInductions', ['inductions' => $user->userInductions])
        </div>
    </div>
</div>

@endsection