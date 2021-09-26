<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';

    protected $fillable = [
        'date',
        'dentist_id',
        'end',
        'remarks',
        'service_id',
        'start',
        'status',
    ];


    protected $dates = [
        'created_at',
        'date',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/appointments/' . $this->getKey());
    }

    /* ************************ RELATIONSHIPS ************************* */

    public function dentist()
    {
        return $this->belongsTo(AdminUser::class, 'dentist_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
