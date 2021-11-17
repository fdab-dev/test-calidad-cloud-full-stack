<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'birthday' => 'required|date',
            'status' => 'required|max:3|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'email.required' => 'El :attribute es obligatorio y debe ser único.',
            'birthday.required' => 'La :attribute es obligatoria.',
            'birthday.date' => 'La :attribute debe tener un formato válido de fecha.',
            'status.required' => 'El :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre del usuario',
            'email' => 'correo electrónico',
            'birthday' => 'fecha cumpleaños',
            'status' => 'estatus usuario',
        ];
    }

    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
}
