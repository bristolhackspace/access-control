<?php

namespace App\Http\Requests;

use App\Models\Login;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLoginRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('login_create');
    }

    public function rules()
    {
        return [
            'machine_id' => [
                'required',
                'integer',
            ],
            'card_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
