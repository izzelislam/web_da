<?php

namespace App\Exports;

use App\Models\SchoolYear;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftarExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    use Exportable;

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Nama lengkap',
            'NIK',
            'Unit',
            'Tahun Ajaran',
            'Jenis Kelamin',
            'No Telepon',
            'Email',
            'Tanggal lahir',
            'Tempat lahir',
            'Jumlah Saudara',
            'Anak Ke',
            'Rt/Rw',
            'kelurahan',
            'Kecamatan',
            'Kabupaten',
            'Provinsi',
            'Alamat',
            'Bahasa Sehari-hari',
            'Tinggi Badan',
            'Berat Badan',
            'Penglihatan',
            'Pendengaran',
            'Golongan Darah',
            'Penyakit yang sedanag diderita',
            'Penyakit yang pernah diderita',
            'Asal sekolah',
            'Nama Ayah',
            'Tanggal Lahir Ayah',
            'Tempat Lahir Ayah',
            'Profesi Ayah',
            'Pendidikan Terakhir Ayah',
            'Pendapatan Perbulan Ayah',
            'Nama Ibu',
            'Tanggal Lahir Ibu',
            'Tempat Lahir Ibu',
            'Profesi Ibu',
            'Pendidikan Terakhir Ibu',
            'Pendapatan Perbulan Ibu',
        ];
    }

    public function query()
    {
        $school_year = SchoolYear::where('status', 1)->orderBy('year', 'desc')->first();
        $users =     User::query();

        $users->with(['unit', 'biodata', 'schoolyear', 'father', 'mother']);

        if (isset(request()->unit)){
            $users->whereHas('unit', function ($query) {
                $query->where('unit_id', request()->unit);
            });
        }

        if (isset(request()->school_year)){
            $users->whereHas('schoolYear', function($query){
                $query->where('year', request()->school_year);
            });
        }else{
            if (!empty($school_year)){
                $users->whereHas('schoolYear', function($query) use($school_year) {
                    $query->where('year', $school_year->year);
                }); 
            }
        }
        return $users;
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->biodata->fullname ?? '',
            $user->nik,
            $user->unit->name,
            $user->schoolYear->year,
            $user->gender,
            $user->phone_number,
            $user->email,
            $user->biodata->brth_date ?? '',
            $user->biodata->brth_place ?? '',
            !empty($user->biodata->brothers) ? $user->biodata->brothers. ' Saudara' :'',
            $user->biodata->order_of_birth ?? '',
            $user->biodata->rt_rw ?? '',
            $user->biodata->village ?? '',
            $user->biodata->district ?? '',
            $user->biodata->regency ?? '',
            $user->biodata->province ?? '',
            $user->biodata->address ?? '',
            $user->biodata->language ?? '',
            !empty($user->biodata->height) ? $user->biodata->height . ' cm' : '',
            !empty($user->biodata->weight) ? $user->biodata->weight . ' Kg': '',
            !empty($user->biodata->vision) ? ($user->biodata->vision == 1 ? 'Normal' : 'Tidak Normal') : '',
            !empty($user->biodata->hearing) ? ($user->biodata->hearing == 1 ? 'Normal' : 'Tidak Normal') : '',
            // $user->biodata->hearing == 1 ? 'Normal' : 'Tidak Normal',
            $user->biodata->blood ?? '',
            $user->biodata->disease_present ?? '',
            $user->biodata->disease_once ?? '',
            $user->biodata->prev_school ?? '',
            $user->father->name ?? '',
            $user->father->birth_date ?? '',
            $user->father->place_birth ?? '',
            $user->father->profession ?? '',
            $user->father->last_education ?? '',
            $user->father->income ?? '',
            $user->mother->name ?? '',
            $user->mother->birth_date ?? '',
            $user->mother->place_birth ?? '',
            $user->mother->profession ?? '',
            $user->mother->last_education ?? '',
            $user->mother->income ?? '',
        ];
    }
}
