<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return auth()->guard('web')->check();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'img' => 'required|mimes:png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'img.required' => 'gambar wajib di isi',
            'img.mimes'    => 'format tidak valid',
            'img.max'     => 'gambar lebih dari 5 mb'
        ];
    }
}
