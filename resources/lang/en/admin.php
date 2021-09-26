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

    // Do not delete me :) I'm used for auto-generation



];
