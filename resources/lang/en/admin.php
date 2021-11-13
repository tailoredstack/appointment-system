<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'phone_no' => 'Phone no',

            //Belongs to many relations
            'roles' => 'Roles',

        ],
    ],
    'patient' => [
        'title' => 'Patient',

        'actions' => [
            'index' => 'Patient',
            'show' => 'View Patient',
            'create' => 'New Patient',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'admin_users_id' => 'Admin users',
            'email' => 'Email',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'phone_no' => 'Phone no',

        ],
    ],
    'dentist' => [
        'title' => 'Dentist',

        'actions' => [
            'index' => 'Dentist',
            'show' => 'View Dentist',
            'create' => 'New Dentist',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'admin_users_id' => 'Admin users',
            'email' => 'Email',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'phone_no' => 'Phone no',

        ],
    ],

    'service' => [
        'title' => 'Service',

        'actions' => [
            'index' => 'Service',
            'show' => 'View Service',
            'create' => 'New Service',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'duration' => 'Duration',
            'name' => 'Name',
            'price' => 'Price',

        ],
    ],

    'secretary' => [
        'title' => 'Secretary',

        'actions' => [
            'index' => 'Secretary',
            'show' => 'View Secretary',
            'create' => 'New Secretary',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'admin_users_id' => 'Admin users',
            'email' => 'Email',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'phone_no' => 'Phone no',

        ],
    ],

    'schedule' => [
        'title' => 'Schedule',

        'actions' => [
            'index' => 'Schedule',
            'show' => 'View Schedule',
            'create' => 'New Schedule',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'date' => 'Date',
            'dentist_id' => 'Dentist',
            'end' => 'End',
            'start' => 'Start',

        ],
    ],

    'appointment' => [
        'title' => 'Appointment',

        'actions' => [
            'index' => 'Appointment',
            'show' => 'View Appointment',
            'create' => 'New Appointment',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'appointment' => [
        'title' => 'Appointment',

        'actions' => [
            'index' => 'Appointment',
            'show' => 'View Appointment',
            'create' => 'New Appointment',
            'edit' => 'Edit :name',
            'export' => 'Export',
        ],

        'columns' => [
            'id' => 'ID',
            'date' => 'Date',
            'dentist_id' => 'Dentist',
            'end' => 'End',
            'remarks' => 'Remarks',
            'service_id' => 'Service',
            'start' => 'Start',
            'status' => 'Status',
            
        ],
    ],

    'appointment' => [
        'title' => 'Appointment',

        'actions' => [
            'index' => 'Appointment',
            'show' => 'View Appointment',
            'create' => 'New Appointment',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'date' => 'Date',
            'dentist_id' => 'Dentist',
            'end' => 'End',
            'patient_id' => 'Patient',
            'remarks' => 'Remarks',
            'service_id' => 'Service',
            'start' => 'Start',
            'status' => 'Status',
            
        ],
    ],

    'feedback' => [
        'title' => 'Feedback',

        'actions' => [
            'index' => 'Feedback',
            'create' => 'New Feedback',
            'show' => 'Show Feedback',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'feedback' => [
        'title' => 'Feedback',

        'actions' => [
            'index' => 'Feedback',
            'create' => 'New Feedback',
            'show' => 'Show Feedback',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'content' => 'Content',
            'patient_id' => 'Patient',
            
        ],
    ],

    'activity-log' => [
        'title' => 'Activity Log',

        'actions' => [
            'index' => 'Activity Log',
            'create' => 'New Activity Log',
            'show' => 'Show Activity Log',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation














];
