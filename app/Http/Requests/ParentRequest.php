<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParentRequest extends FormRequest
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
            'name'              => 'required',
            'birth_date'        => 'required',
            'place_birth'       => 'required',
            'profession'        => 'required',
            'last_education'    => 'required',
            'income'            => 'required|numeric|digits_between:1,12',
        ];
    }

    public function messages()
    {
        return [
            'name.reuired'              => 'nama orang tua wajib di isi',
            'birth_date.required'        => 'tanggal lahir wajib di isi',
            'place_birth.required'       => 'tempat lahir wajib di isi',
            'profession.required'        => 'profesi wajib di isi',
            'last_education.required'    => 'pendidikan terakhir wajib di isi',
            'income.required'            => 'penghasilan wajib di isi',
            'income.digits_between'            => 'penghasilan wajib antara 1 sampai 12 digit',
        ];
    }
}
