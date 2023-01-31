<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLoginRequest;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\UpdateLoginRequest;
use App\Models\Card;
use App\Models\Login;
use App\Models\Machine;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('login_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $logins = Login::with(['machine', 'card'])->get();

        return view('admin.logins.index', compact('logins'));
    }

    public function create()
    {
        abort_if(Gate::denies('login_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machines = Machine::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cards = Card::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.logins.create', compact('cards', 'machines'));
    }

    public function store(StoreLoginRequest $request)
    {
        $login = Login::create($request->all());

        return redirect()->route('admin.logins.index');
    }

    public function edit(Login $login)
    {
        abort_if(Gate::denies('login_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machines = Machine::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cards = Card::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $login->load('machine', 'card');

        return view('admin.logins.edit', compact('cards', 'login', 'machines'));
    }

    public function update(UpdateLoginRequest $request, Login $login)
    {
        $login->update($request->all());

        return redirect()->route('admin.logins.index');
    }

    public function show(Login $login)
    {
        abort_if(Gate::denies('login_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $login->load('machine', 'card');

        return view('admin.logins.show', compact('login'));
    }

    public function destroy(Login $login)
    {
        abort_if(Gate::denies('login_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $login->delete();

        return back();
    }

    public function massDestroy(MassDestroyLoginRequest $request)
    {
        Login::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
