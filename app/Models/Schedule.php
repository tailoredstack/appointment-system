<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = [
        'date',
        'dentist_id',
        'end',
        'start',

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
        return url('/admin/schedules/' . $this->getKey());
    }

    /* ************************ RELATIONSHIPS ************************* */

    public function dentist()
    {
        return $this->belongsTo(AdminUser::class, 'dentist_id', 'id');
    }
}
