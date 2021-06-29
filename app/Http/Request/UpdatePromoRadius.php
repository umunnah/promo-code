<?php


namespace App\Http\Request;


use App\Helpers\Requests\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePromoRadius extends FormRequest
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
        ];
    }
}
