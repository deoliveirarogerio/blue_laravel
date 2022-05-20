<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
        $id = $this->route('contact');
        return [
            'name' => 'required|string|max:255',

            'phone' => [
                'required',
                'string',
                'max:255',
                Rule::unique('appointmentbooks')->ignore($id),
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('appointmentbooks')->ignore($id),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O campo nome aceita até 255 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email válido',
            'email.max' => 'O campo email aceita até 255 caracteres',
            'email.unique' => 'E-mail já cadastrado',
            'phone.required' => 'O campo telefone é obrigatório',
        ];
    }
}
