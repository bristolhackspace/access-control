<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMachineRequest;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Models\Machine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MachineController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('machine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machines = Machine::all();

        return view('frontend.machines.index', compact('machines'));
    }

    public function create()
    {
        abort_if(Gate::denies('machine_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.machines.create');
    }

    public function store(StoreMachineRequest $request)
    {
        $machine = Machine::create($request->all());

        return redirect()->route('frontend.machines.index');
    }

    public function edit(Machine $machine)
    {
        abort_if(Gate::denies('machine_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.machines.edit', compact('machine'));
    }

    public function update(UpdateMachineRequest $request, Machine $machine)
    {
        $machine->update($request->all());

        return redirect()->route('frontend.machines.index');
    }

    public function show(Machine $machine)
    {
        abort_if(Gate::denies('machine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machine->load('machineInductions', 'machineLogins');

        return view('frontend.machines.show', compact('machine'));
    }

    public function destroy(Machine $machine)
    {
        abort_if(Gate::denies('machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machine->delete();

        return back();
    }

    public function massDestroy(MassDestroyMachineRequest $request)
    {
        Machine::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
