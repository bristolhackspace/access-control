<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCardRequest;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CardController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cards = Card::with(['user'])->get();

        return view('admin.cards.index', compact('cards'));
    }

    public function create()
    {
        abort_if(Gate::denies('card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cards.create', compact('users'));
    }

    public function store(StoreCardRequest $request)
    {
        $card = Card::create($request->all());

        return redirect()->route('admin.cards.index');
    }

    public function edit(Card $card)
    {
        abort_if(Gate::denies('card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $card->load('user');

        return view('admin.cards.edit', compact('card', 'users'));
    }

    public function update(UpdateCardRequest $request, Card $card)
    {
        $card->update($request->all());

        return redirect()->route('admin.cards.index');
    }

    public function show(Card $card)
    {
        abort_if(Gate::denies('card_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $card->load('user', 'cardLogins');

        return view('admin.cards.show', compact('card'));
    }

    public function destroy(Card $card)
    {
        abort_if(Gate::denies('card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $card->delete();

        return back();
    }

    public function massDestroy(MassDestroyCardRequest $request)
    {
        Card::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
