<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'name',
        'hoby',
        'goals',
        'brth_date',
        'brth_place',
        'nisn',
        'no_akta',
        'brothers',
        'order_of_birth',
        'address',
        'rt',
        'rw',
        'village',
        'district_id',
        'regency_id',
        'province_id',
        'postal_code',
        'language',
        'cloth_size',
        'no_wali',
        'height',
        'weight',
        'blood',
        'vision',
        'minus',
        'hearing',
        'disease_present',
        'disease_once',
        'prev_school',
        'moved_school',
        'learn_duration',
        'accepted_at',
        'moved_reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
