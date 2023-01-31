<?php

namespace App\Http\Requests;

use App\Models\Induction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInductionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('induction_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'machine_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
