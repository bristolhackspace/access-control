@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.machine.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.machines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.id') }}
                        </th>
                        <td>
                            {{ $machine->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.name') }}
                        </th>
                        <td>
                            {{ $machine->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.code') }}
                        </th>
                        <td>
                            {{ $machine->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.induction') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $machine->induction ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $machine->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.machines.index') }}">
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
            <a class="nav-link" href="#machine_inductions" role="tab" data-toggle="tab">
                {{ trans('cruds.induction.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#machine_logins" role="tab" data-toggle="tab">
                {{ trans('cruds.login.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="machine_inductions">
            @includeIf('admin.machines.relationships.machineInductions', ['inductions' => $machine->machineInductions])
        </div>
        <div class="tab-pane" role="tabpanel" id="machine_logins">
            @includeIf('admin.machines.relationships.machineLogins', ['logins' => $machine->machineLogins])
        </div>
    </div>
</div>

@endsection