<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'required|mimes:png,jpg|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'bukti pembayaran wajib di isi',
            'image.mimes' => 'bukti pembayaran harus jpg atau png',
            'image.max' => 'bukti pembayaran makximal 2 MB',
        ];
    }
}
