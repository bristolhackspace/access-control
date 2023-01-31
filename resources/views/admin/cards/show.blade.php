@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.card.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.card.fields.id') }}
                        </th>
                        <td>
                            {{ $card->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.card.fields.number') }}
                        </th>
                        <td>
                            {{ $card->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.card.fields.rfid') }}
                        </th>
                        <td>
                            {{ $card->rfid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.card.fields.user') }}
                        </th>
                        <td>
                            {{ $card->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.card.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $card->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.card.fields.paid_for') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $card->paid_for ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cards.index') }}">
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
            <a class="nav-link" href="#card_logins" role="tab" data-toggle="tab">
                {{ trans('cruds.login.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="card_logins">
            @includeIf('admin.cards.relationships.cardLogins', ['logins' => $card->cardLogins])
        </div>
    </div>
</div>

@endsection