<?php

namespace App\Http\Requests;

use App\Models\Card;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('card_edit');
    }

    public function rules()
    {
        return [
            'number' => [
                'string',
                'min:4',
                'max:4',
                'required',
                'unique:cards,number,' . request()->route('card')->id,
            ],
            'rfid' => [
                'string',
                'nullable',
            ],
        ];
    }
}
