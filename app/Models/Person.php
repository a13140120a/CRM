<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model 
{

    protected $table = 'persons';

    // protected $with = 'organization';

    protected $casts = [
        'emails'          => 'array',
        'contact_numbers' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'emails',
        'contact_numbers',
        'organization_id',
    ];

}
