<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|min:6',
            'username' => 'required|string|min:3',
            'password' => 'required|integer|min:3',
            'phone' => 'required'
        ];
    }
    public function messages(){
        return[
            'full_name.required' => 'To\'liq ism maydoni talab qilinadi',
            'full_name.string' => 'To\'liq ism maydoni qator bo\'lishi kerak.',
            'full_name.min:6' => 'To\'liq ism maydoni kamida 6 ta belgidan iborat bo\'lishi kerak.',
            'username.required' => 'Foydalanuvchi nomi maydonini kiritish shart',
            'username.string' => 'Foydalanuvchi nomi maydoni qator bo\'lishi kerak.',
            'username.min:3' => 'Foydalanuvchi nomi maydoni kamida 3 ta belgidan iborat bo\'lishi kerak.',
            'password.required' => 'Parol kiritish majburiy',
            'password.interger' => 'Parol kiritish maydoni raqamlardan iborat bolishi kerak',
            'password.min:3' => 'Parol kiritish maydoniga kamida 3 ta belgidan iborat bolishi kerak',
            'phone' => 'Telefon raqam kiritish majburiy'
        ];
    }
}
