<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInductionRequest;
use App\Http\Requests\StoreInductionRequest;
use App\Http\Requests\UpdateInductionRequest;
use App\Models\Induction;
use App\Models\Machine;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InductionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('induction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inductions = Induction::with(['user', 'machine', 'inducted_by'])->get();

        return view('frontend.inductions.index', compact('inductions'));
    }

    public function create()
    {
        abort_if(Gate::denies('induction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $machines = Machine::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inducted_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.inductions.create', compact('inducted_bies', 'machines', 'users'));
    }

    public function store(StoreInductionRequest $request)
    {
        $induction = Induction::create($request->all());

        return redirect()->route('frontend.inductions.index');
    }

    public function edit(Induction $induction)
    {
        abort_if(Gate::denies('induction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $machines = Machine::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inducted_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $induction->load('user', 'machine', 'inducted_by');

        return view('frontend.inductions.edit', compact('inducted_bies', 'induction', 'machines', 'users'));
    }

    public function update(UpdateInductionRequest $request, Induction $induction)
    {
        $induction->update($request->all());

        return redirect()->route('frontend.inductions.index');
    }

    public function show(Induction $induction)
    {
        abort_if(Gate::denies('induction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $induction->load('user', 'machine', 'inducted_by');

        return view('frontend.inductions.show', compact('induction'));
    }

    public function destroy(Induction $induction)
    {
        abort_if(Gate::denies('induction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $induction->delete();

        return back();
    }

    public function massDestroy(MassDestroyInductionRequest $request)
    {
        Induction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
