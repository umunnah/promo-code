<?php


namespace App\Http\Request;


use App\Helpers\Requests\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    use FailedValidation;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|min:6',
        ];
    }
}
