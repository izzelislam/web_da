<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unit_id',
        'school_year_id',
        'name',
        'email',
        'phone_number',
        'image',
        'password',
        'gender',
        'code',
        'nik'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function ortu()
    {
        return $this->hasOne(Ortu::class);
    }

    public function qurbanSaving()
    {
        return $this->hasOne(QurbanSaving::class);
    }

    protected static function boot() {
        parent::boot();
        
        static::deleting(function($check) {
            $check->ortu()->delete();
            $check->biodata()->delete();
            $check->payment()->delete();
        });
    }
}
