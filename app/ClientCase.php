<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCase extends Model
{
    protected $table = 'clientcases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'case_id', 'client_name', 'client_id', 'client_email', 'client_package', 'client_phonenumber', 'case_status', 'sub_status', 'doctor_id', 'content'
    ];
}
