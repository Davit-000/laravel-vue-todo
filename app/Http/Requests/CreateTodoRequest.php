<?php

namespace App\Http\Requests;

use App\Todo;
use Illuminate\Foundation\Http\FormRequest;

class CreateTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'done' => 'required|boolean'
        ];
    }

    public function save()
    {
        return Todo::create($this->all());
    }
}