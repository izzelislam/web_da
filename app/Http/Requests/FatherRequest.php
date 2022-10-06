<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FatherRequest extends FormRequest
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
            'father_name'              => 'required',
            'father_birth_date'        => 'required',
            'father_place_birth'       => 'required',
            'father_profession'        => 'required',
            'father_last_education'    => 'required',
            'father_income'            => 'required|numeric|digits_between:1,12',
        ];
    }

    public function messages()
    {
        return [
            'father_name.reuired'              => 'nama orang tua wajib di isi',
            'father_birth_date.required'        => 'tanggal lahir wajib di isi',
            'father_place_birth.required'       => 'tempat lahir wajib di isi',
            'father_profession.required'        => 'profesi wajib di isi',
            'father_last_education.required'    => 'pendidikan terakhir wajib di isi',
            'father_income.required'            => 'penghasilan wajib di isi',
            'father_income.digits_between'            => 'penghasilan wajib antara 1 sampai 12 digit',
        ];
    }
}
