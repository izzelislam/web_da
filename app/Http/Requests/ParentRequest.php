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
            'father_name'           => 'required',
            'father_nik'            => 'required',
            'father_birth_date'     => 'required',
            'father_place_birth'    => 'required',
            'father_profession'     => 'required',
            'father_last_education' => 'required',
            'father_income'         => 'required',
            'mother_name'           => 'required',
            'mother_nik'            => 'required',
            'mother_birth_date'     => 'required',
            'mother_place_birth'    => 'required',
            'mother_profession'     => 'required',
            'mother_last_education' => 'required',
            'mother_income'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'father_name.required' => ' Nama ayah wajib di isi',
            'father_nik.required' => 'NIK ayah wajib di isi',
            'father_birth_date.required' => 'Tanggal lahir ayah wajib di isi',
            'father_place_birth.required' => 'Tempatlahir ayah wajib di isi',
            'father_profession.required' => 'Profesi ayah wajib di isi',
            'father_last_education.required' => 'Pendidikan terakhir ayah wajib di isi',
            'father_income.required' => 'Pendapatan perbulan ayah wajib di isi',
            'mother_name.required' => 'Nama ibu wajib di isi',
            'mother_nik.required' => 'NIK ibu wajib di isi',
            'mother_birth_date.required' => 'Tanggal lahir ibu wajib di isi',
            'mother_place_birth.required' => 'Tempat lahir ibu wajib di isi',
            'mother_profession.required' => 'Profesi ibu wajib di isi',
            'mother_last_education.required' => 'Pendidikan terakhir ibu wajib di isi',
            'mother_income.required' => 'Pendapatan perbulan ibu wajib di isi',
        ];
    }
}
