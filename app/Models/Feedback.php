<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'content',
        'patient_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/feedback/' . $this->getKey());
    }

    public function patient()
    {
        return $this->belongsTo(AdminUser::class, 'patient_id', 'id');
    }
}
