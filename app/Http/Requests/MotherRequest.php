<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotherRequest extends FormRequest
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
            'mother_name'              => 'required',
            'mother_birth_date'        => 'required',
            'mother_place_birth'       => 'required',
            'mother_profession'        => 'required',
            'mother_last_education'    => 'required',
            'mother_income'            => 'required|numeric|digits_between:1,12',
        ];
    }

    public function messages()
    {
        return [
            'mother_name.reuired'              => 'nama orang tua wajib di isi',
            'mother_birth_date.required'        => 'tanggal lahir wajib di isi',
            'mother_place_birth.required'       => 'tempat lahir wajib di isi',
            'mother_profession.required'        => 'profesi wajib di isi',
            'mother_last_education.required'    => 'pendidikan terakhir wajib di isi',
            'mother_income.required'            => 'penghasilan wajib di isi',
            'mother_income.digits_between'            => 'penghasilan wajib antara 1 sampai 12 digit',
        ];
    }
}
