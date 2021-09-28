<?php

namespace App\Models;

use Brackets\AdminAuth\Models\AdminUser as DefaultAdminUser;


class AdminUser extends DefaultAdminUser
{
    public function patient()
    {
        return $this->hasOne(Patient::class, 'admin_users_id', 'id');
    }

    public function secretary()
    {
        return $this->hasOne(Secretary::class, 'admin_users_id', 'id');
    }


    public function dentist()
    {
        return $this->hasOne(Dentist::class, 'admin_users_id', 'id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'dentist_id', 'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id', 'id');
    }
}
