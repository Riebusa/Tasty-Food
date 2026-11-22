<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KontakRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => ['required', 'string', 'max:150'],
            'nama'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'pesan'   => ['required', 'string', 'max:3000'],
        ];
    }

    public function attributes(): array
    {
        return ['subject' => 'subjek', 'nama' => 'nama', 'email' => 'email', 'pesan' => 'pesan'];
    }

    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'email'    => 'Format email tidak valid.',
            'max'      => 'Kolom :attribute maksimal :max karakter.',
        ];
    }
}