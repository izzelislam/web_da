<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $blood_type = ['A', 'AB', 'B', 'O', '-'];
        return [
            'fullname'          => 'required',
            'name'              => 'required',
            'hoby'              => 'required',
            'goals'              => 'required',
            'brth_date'         => 'required',
            'brth_place'        => 'required',
            'nisn'              => 'required',
            'no_akta'              => 'required',
            'brothers'        => 'required',
            'order_of_birth'    => 'required',
            'address'           => 'required',
            'rt'             => 'required',
            'rw'             => 'required',
            'village'           => 'required',
            'district_id'          => 'required',
            'regency_id'           => 'required',
            'province_id'          => 'required',
            'postal_code'          => 'required',
            'language'          => 'required',
            'cloth_size'          => 'required',
            'no_wali'          => 'required',
            'height'            => 'required|numeric|digits_between:1,3',
            'weight'            => 'required|numeric|digits_between:1,3',
            'blood'             => "required",
            'vision'            => 'required|boolean',
            'hearing'           => 'required|boolean',
            'disease_present'   => 'required',
            'disease_once'      => 'required',
            'prev_school'       => 'required',
            'moved_school'      => 'string|nullable',
            'learn_duration'    => 'string|nullable',
            'accepted_at'       => 'date|nullable',
            'moved_reason'      => 'string|nullable',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Nama lengkap wajib di isi',
            'nisn.required'              => 'NISN wajib di isi',
            'no_akta.required'            => 'No Akta wajib di isi',
            'name.required'              => 'Nama pangilan wajib di isi',
            'hoby.required'              => 'Hobi wajib di isi',
            'no_wali.required'              => 'No Wali wajib di isi',
            'cloth_size.required'              => 'Ukuran baju wajib di isi',
            'goals.required'              => 'Cita-Cita  wajib di isi',
            'rt.required'              => 'RT  wajib di isi',
            'rw.required'              => 'RW  wajib di isi',
            'brth_date.required'         => 'Tanggal lahir wajib di isi',
            'brth_place.required'        => 'Tempat lahir wajib di isi',
            'order_of_birth.required'    => 'Urutan kelahiran wajib di isi',
            'language.required'          => 'Bahasa wajib di isi',
            'address.required'           => 'Alamat wajib di isi',
            'rt_rw.required'             => 'Rt/Rw wajib di isi',
            'village.required'           => 'Desa wajib di isi',
            'district_id.required'          => 'Kecamatan wajib di isi',
            'regency_id.required'           => 'Kabupaten wajib di isi',
            'province_id.required'          => 'Provinsi wajib di isi',
            'height.required'            => 'Tinggi badan wajib di isi',
            'height.numeric'             => 'Tinggi badan wajib berupa nomor',
            'height.digits_between'             => 'Tinggi badan harus antara 1 sampai 3 digit',
            'weight.required'            => 'Berat badan wajib di isi',
            'weight.numeric'             => 'Berat badan wajib berupa nomor',
            'weight.digits_between'             => 'Berat badan harus antara 1 sampai 3 digit',
            'vision.required'            => 'Penglihatan wajib di pilih',
            'vision.boolean'            => 'Penglihatan wajib type boolean',
            'hearing.required'            => 'Pendengaran wajib di pilih',
            'hearing.boolean'            => 'Pendengaran wajib type boolean',
            'disease_present.required'   => 'Penyakit yang sedang di derita wajib di isi, tulis "tidak ada" jika tidak ada',
            'disease_once.required'      => 'Penyakit yang pernah di derita wajib di isi, tulis "tidak ada" jika tidak ada',
            'prev_school.required'       => 'Asal sekolah wajib di isi',
            'brothers.required'          => 'Jumlah saudara wajib di isi',
            'blood.required'             => 'Golongan darah wajib di pilih',
            'moved_school.string'      => 'pindah dari sekolah wajib berupa text',
            'learn_duration.string'    => 'lama belajar wajib berupa text',
            'accepted_at.date'       => 'diterima pada wajib berupa tanggal',
            'moved_reason.string'      => 'alasan pindah wajib berupa text',
        ];
    }

    protected function prepareForValidation()
    {
        // $this->merge([
        //     'user_id' => auth()->user()->id,
        // ]);
    }
}
