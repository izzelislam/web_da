<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocRequest extends FormRequest
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
            'akta' => 'required|mimes:pdf,pdf|max:10000', 
            'ijazah' => 'required|mimes:pdf,pdf|max:10000', 
            'family_card' => 'required|mimes:pdf,pdf|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'akta.required' => 'akta wajib diisi', 
            'akta.mimes' => 'akta harus berformat pdf', 
            'ijazah.required' => 'Tanda kelulusan wajib diisi', 
            'ijazah.mimes' => 'Tanda kelulusan harus berformat pdf', 
            'family_card.required' => 'Kartu keluarga wajib diisi', 
            'family_card.mimes' => 'Kartu keluarga harus berformat pdf', 
        ];
    }
}
