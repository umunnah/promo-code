<?php


namespace App\Http\Request;


use App\Helpers\Requests\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class StorePromo extends FormRequest
{
    use FailedValidation;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'radius' => 'required|numeric',
            'amount' => 'required|numeric',
            'event_id' => 'required|exists:events,id',
            'status' => 'nullable|boolean',
        ];
    }
}
