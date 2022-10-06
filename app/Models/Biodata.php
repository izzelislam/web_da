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
        'brth_date',
        'brth_place',
        'order_of_birth',
        'language',
        'address',
        'rt_rw',
        'village',
        'district',
        'regency',
        'province',
        'height',
        'weight',
        'vision',
        'hearing',
        'disease_present',
        'disease_once',
        'prev_school',
        'moved_school',
        'learn_duration',
        'accepted_at',
        'moved_reason',
        'brothers',
        'blood'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
